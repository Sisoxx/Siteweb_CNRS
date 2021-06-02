import math
import cmath
import sys
from epsieau import EPSSIG
from colecole.py import colecole, frequence

input_T = float(sys.argv[1])
input_ST = int(sys.argv[2])
input_V1 = float(sys.argv[3])
input_RLOI = bool(sys.argv[4])
input_choice = sys.argv[5]
low_range_input = int(sys.argv[6])
high_range_input = int(sys.argv[7])
round_step_input = float(sys.argv[8])


def optim (T,ST,V1,RLOI): # Température, Salinité, V1 entre 0 et 1, RLOI TRUE ==> Bottcher FALSE ==> Kra
    #Depuis programme colecole on suppose deux listes epsilon et sigma des tissus.
    EPS_Tissu, SIG_Tissu = colecole(input_choice, low_range_input, high_range_input,round_step_input)
    return EPS_Tissu, SIG_Tissu
    NFRE = len(EPS_Tissu) - 1
    #Triton X100 Lazebnik
    DELTA = 1.6
    TAU = 13.56 * 1e-12
    EPSINF = 3.14
    SIG0 = 0.036
    FREQMI = 1e9
    PASFRE = 0.25e9

    #Calcul différentes constantes - Initialisation
    V2 = 1 - V1
    S = ST/V2
    EPFACT = 1e-9/(36*math.pi)
    N = 0
    F01 = 10
    SOMEPS = 0
    EPSTISSU = []
    X1 = S
    X2 = V2

    #RLOI = TRUE OR FALSE

    #Création de l'epsilon total du tissu
    for i in range (0,NFRE):
        FREQ = FREQMI + i*PASFRE
        OMEGA = 2 * math.pi * FREQ
        EPSTISSU.append(complex(EPS_Tissu[i],SIG_Tissu[i] / (OMEGA * EPFACT)))
        SOMEPS = SOMEPS + abs(EPSTISSU[i])**2

    while  (N <20):
        F01 = 0
        GRAD1 = 0
        GRAD2 = 0

        #HES = np.array([[0,0],
                  #     [0,0]], dtype=float)
        HES00 = 0
        HES01 = 0
        HES10 = 0
        HES11 = 0

        HESINV00 = 0
        HESINV01 = 0
        HESINV10 = 0
        HESINV11 = 0

        #HESINV = np.array([[0,0],
                           #[0,0]], dtype=float)
        EPSOL = []
        SIGSOL = []

        #Calcul propriétés diélectriques des tissus
        for i in range (0,NFRE):


            FREQ = FREQMI+ i*PASFRE
            OMEGA = 2 * math.pi * FREQ

            #Calcul propriétés diélectriques du TX100
            YTX = OMEGA * TAU
            EPSITX = YTX * DELTA / (1 + YTX**2) + SIG0 / (OMEGA * EPFACT)
            EPSRTX = EPSINF + DELTA / (1 + YTX**2)
            #print ("epsitx", EPSITX)
            #print ("epsrtx", EPSRTX)

            #Calcul propriétés diélectriques de l'eau et de ses dérivé en fonction de sa salinité
            a,b,c = EPSSIG(T, FREQ, S)
            EPSEAU = complex(a,b)
            EPS2 = EPSEAU
            EPSTX = complex(EPSRTX,EPSITX)
            EPS1 = EPSTX

            #Calcul par Bottcher
            if RLOI :
                A = 2
                B = EPS2 - 2 * EPS1 - 3 * V2 * (EPS2 - EPS1)
                C = -1 * EPS2 * EPS1
                DET = cmath.sqrt(B**2 - 4 * A * C)
                #print ("det : ", DET)
                LOGEPS = (-1 * B + DET) / (2 * A)
                DFDV = 3 / 4 * (EPS2 - EPS1) * (1 - B / DET)
                DEMDE2 = (3 * V2 - 1) / 4 + ((1 - 3 * V2) * B + 4 * EPS1) / (4 * DET)

            #Calcul par Kraszweski
            else :
                R1 = cmath.sqrt(EPS1)
                R2 = cmath.sqrt(EPS2)
                LOGEPS = (R1+V2*(R2-R1))**2
                A = cmath.sqrt(EPS1 * EPS2)
                B = cmath.sqrt(EPS1 / EPS2)
                #print ("A", A)
                #print ("B", B)
                DFDV = 2 * (A - EPS1 + V2 * (EPS1 + EPS2 - 2 * A))
                DEMDE2 = V2 * B + (1-B) * V2**2
                #print ("DFDV", DFDV)
                #print ("DEMDE2", DEMDE2)

            #Récupération des résultats
            EPSRM = LOGEPS.real
            SIGRM = LOGEPS.imag * OMEGA * EPFACT
            EPSOL.append(EPSRM)
            SIGSOL.append(SIGRM)
            DFDS = DEMDE2 * c/V2
            #print("DFDS :", DFDS)
            FI = LOGEPS - EPSTISSU[i]
            #COR = EPSRM - EPS_Tissu[i]
            #COI = SIGRM - SIG_Tissu[i]
            W = 1 / abs(EPSTISSU[i])**2

            F01 = W * abs(FI)**2 + F01
            #print("F01 :",F01)
            GRAD1 = GRAD1 + 2 * W * (DFDS * FI.conjugate()).real
            #print ("grad1",GRAD1)
            GRAD2 = GRAD2  + 2 * W * (DFDV * FI.conjugate()).real
            #print ("grad2",GRAD2)
            HES00 = HES00 + 2 * W * abs(DFDS)**2
            HES01 = HES01 + 2 * W  * (DFDS * DFDV.conjugate()).real
            HES10 = HES10 + 2 * W * (DFDV * DFDS.conjugate()).real
            HES11 = HES11 + 2 * W * abs(DFDV)**2
            #print("HES00 :", HES00, "HES01 :" , HES01, "HES10 :", HES10, "HES11 :", HES11)

        #Inversion Matrice
        DETHES = (HES00 * HES11) - (HES01 * HES10)
        HESINV00 = HES11 / DETHES
        HESINV11 = HES00 / DETHES
        HESINV01 = (-1 * HES01) / DETHES
        HESINV10 = (-1 * HES10) / DETHES

        #print("HESINV00 :", HESINV00, "HESINV01 :" , HESINV01, "HESINV10 :", HESINV10, "HESINV11 :", HESINV11)

        X1 = X1 - (HESINV00 * GRAD1 + HESINV01 * GRAD2)
        X2 = X2 - (HESINV11 * GRAD2 + HESINV10 * GRAD1)
        #print ("X1 :", X1, "X2: ", X2)
        S = X1
        V2 = X2
        V1 = 1 - V2
        ST = S * V2
        N = N + 1
        #print("N :", N)

    return(N,ST,V1,F01)

print (optim(input_T, input_ST, input_V1, input_RLOI))
