import math
import cmath
import sys
import numpy as np
import matplotlib.pyplot as plt
import numpy as np
import matplotlib.pyplot as plt
from epsieau import EPSSIG
#from colecole.py import colecole, frequence
try:
    input_T = float(sys.argv[1])
except:
    print("il manque un argument")
try:
    input_ST = float(sys.argv[2])
except:
    print("il manque un argument")
try:
    input_V1 = float(sys.argv[3])
except:
    print("il manque un argument")
try:
    input_RLOI = bool(sys.argv[4])
except:
    print("il manque un argument")
try:
    input_choice = sys.argv[5]
except:
    print("il manque un argument")
try:
    low_range_input = float(sys.argv[6])
except:
    print("il manque un argument")
try:
    high_range_input = float(sys.argv[7])
except:
    print("il manque un argument")
try:
    round_step_input = float(sys.argv[8])
except:
    print("il manque un argument")

somme=0
j=cmath.sqrt(-1)
delta=0.5*10**9
epsilon0=1/(36*math.pi*10**9)
M=[]
N=[]
w=2*math.pi


ef=[4.000, 2.500, 4.000, 2.500, 2.500, 2.500, 2.500, 4.000, 4.000, 2.500, 4.000, 4.000, 4.000, 4.000, 4.000, 4.000, 4.000, 4.000, 2.500, 2.500, 4.000, 4.000, 4.000, 4.000, 4.000, 3.000, 4.000, 4.000, 2.500, 4.000, 4.000, 4.000, 4.000, 4.000, 4.000, 4.000, 4.000, 4.000, 4.000, 4.000, 4.000, 2.500, 4.000, 4.000]
delta1=[40.00, 16.00, 56.00, 18.00, 10.00, 9.00, 3.00, 45.00, 32.00, 3.00, 38.00, 40.00, 65.00, 45.00, 50.00, 48.00, 40.00, 50.00, 9.00, 3.00, 55.00, 66.00, 50.00, 47.00, 42.00, 32.00, 39.00, 45.00, 18.00, 50.00, 26.00, 40.00, 32.00, 39.00, 50.00, 48.00, 60.00, 42.00, 55.00, 55.00, 50.00, 38.00, 55.00, 65.00]
to1=[8.842, 8.842, 8.377, 13.263, 13.263, 14.469, 7.958, 7.958, 7.958, 17.680, 13.263, 7.958, 7.958, 7.958, 7.958, 7.958, 7.958, 7.958, 7.958, 7.958, 7.579, 7.579, 7.958, 7.958, 7.958, 8.842, 8.842, 7.958, 7.958, 7.234, 7.958, 8.842, 7.234, 7.958, 7.958, 7.958, 7.958, 12.243, 7.958, 7.958, 7.958, 7.958, 7.958, 7.234]
to1=[e*10**(-12) for e in to1]
alpha1=[0.100, 0.100, 0.100, 0.220, 0.200, 0.200, 0.200, 0.100, 0.100, 0.100, 0.150, 0.100, 0.100, 0.100, 0.100, 0.100, 0.150, 0.100, 0.200, 0.200, 0.050, 0.050, 0.100, 0.100, 0.100, 0.100, 0.100, 0.100, 0.100, 0.100, 0.100, 0.150, 0.000, 0.100, 0.100, 0.100, 0.100, 0.100, 0.100, 0.100, 0.100, 0.100, 0.100, 0.220]
delta2=[50, 400, 5200, 300, 180, 80, 25, 400, 100, 15, 2500, 700, 40, 200, 3000, 4000, 200, 4000, 35, 15, 40, 50, 1200, 3500, 1500, 100, 6000, 1000, 500, 7000, 500, 400, 1100, 280, 10000, 2500, 2000, 60, 5000, 2500, 4000, 400, 800, 30]
to2=[3.183, 159.155, 132.629, 79.577, 79.577, 15.915, 15.915, 15.915, 7.958, 63.660, 144.686, 15.915, 1.592, 15.915, 159.155, 159.155, 7.958, 159.155, 15.915, 15.915, 1.592, 1.592, 159.155, 198.944, 79.577, 10.610, 530.516, 159.155, 63.662, 353.678, 106.103, 15.915, 32.481, 79.577, 159.155, 63.662, 79.577, 6.366, 159.155, 159.155, 159.155, 63.662, 31.831, 159.155]
to2=[e*10**(-9) for e in to2]
alpha2=[0.100, 0.101, 0.102, 0.103, 0.104, 0.105, 0.106, 0.107, 0.108, 0.109, 0.110, 0.111, 0.112, 0.113, 0.114, 0.115, 0.116, 0.117, 0.118, 0.119, 0.120, 0.121, 0.122, 0.123, 0.124, 0.125, 0.126, 0.127, 0.128, 0.129, 0.130, 0.131, 0.132, 0.133, 0.134, 0.135, 0.136, 0.137, 0.138, 0.139, 0.140, 0.141, 0.142, 0.143]


sig=[0.250, 0.200, 0.700, 0.070, 0.020, 0.100, 0.001, 0.020, 0.020, 0.010, 0.150, 0.040, 2.000, 0.300, 0.010, 0.400, 0.500, 0.500, 0.035, 0.010, 0.900, 1.400, 0.050, 0.050, 0.300, 0.200, 0.020, 0.200, 0.030, 0.200, 0.006, 0.300, 0.000, 0.000, 0.500, 0.030, 0.500, 0.250, 0.400, 0.500, 0.250, 0.300, 0.200, 1.500]
delta3=[10,	10,	0,	2, 0.5,	1,	0.5, 20, 4, 5, 10, 20, 0, 15, 10, 10, 1, 10, 3.3, 3.3, 0.1, 0, 45, 25, 20, 0.1, 50, 50, 25, 120, 7, 10, 0, 3, 50, 20, 10, 6, 10, 10, 10, 5, 30, 0]
delta3=[e*10**4 for e in delta3]
to3=[159.155, 159.155, 159.155, 159.155, 159.155, 1591.549, 1591.549, 106.103, 53.052, 454.700, 318.310, 106.103, 159.155, 106.103, 159.155, 15.915, 159.155, 159.155, 159.155, 159.155, 159.155, 159.155, 72.343, 79.577, 159.155, 15.915, 22.736, 159.155, 159.155, 318.310, 15.915, 159.155, 159.155, 1.592, 159.155, 265.258, 159.155, 318.310, 159.155, 159.155, 159.155, 15.915, 59.155, 159.155]
to3=[e*10**(-6) for e in to3]
alpha3=[0.200, 0.200, 0.200, 0.200, 0.200, 0.100, 0.100, 0.220, 0.300, 0.100, 0.100, 0.220, 0.000, 0.180, 0.200, 0.200, 0.200, 0.200, 0.050, 0.050, 0.200, 0.200, 0.220, 0.220, 0.100, 0.200, 0.200, 0.200, 0.200, 0.100, 0.200, 0.270, 0.200, 0.160, 0.200, 0.250, 0.200, 0.220, 0.200, 0.200, 0.200, 0.200, 0.200, 0.000]

delta4=[1, 1, 0, 2, 0.01, 0.2, 0.2, 4.5, 3.5, 2, 4, 4.5, 0, 4, 4, 0.1, 0.5, 1, 1, 0.004, 0, 2.5, 3, 4, 0.0005, 3, 1, 4, 2.5, 4, 4, 0, 0.003, 4, 5, 4, 2, 4, 4, 4, 4, 0.1, 3.5, 0]
delta4=[e*10**7 for e in delta4]
to4=[1.592, 15.915, 15.915, 15.915, 15.915, 15.915, 15.915, 5.305, 7.958, 13.260, 15.915, 5.305, 15.915, 1.592, 1.592, 15.915, 15.915, 15.915, 15.915, 7.958, 15.915, 15.915, 4.547, 4.547,  15.915, 15.915, 15.915, 15.915, 7.958, 2.274,  15.915, 15.915, 15.915, 1.592, 15.915, 6.366, 15.915, 1.326, 15.915, 15.915, 15.915, 15.915, 1.061, 15.915]
to4=[e*10**(-3) for e in to4]
alpha4=[0, 0, 0, 0, 0, 0.1, 0.1, 0, 0.02, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.01, 0.01, 0, 0.2, 0, 0, 0, 0, 0.05, 0, 0, 0, 0, 0, 0.2, 0.2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]


noms_tissu=["Aorta", "Bladder", "Blood", "Bone (Cancellous)", "Bone (Cortical)", "Bone Marrow (Infiltrated)", "Bone Marrow (Not Infiltrated)", "Brain (Grey Matter)", "Brain (White Matter)", "Breast Fat", "Cartilage", "Cerebellum", "Cerebro Spinal Fluid", "Cervix", "Colon", "Cornea", "Dura", "Eye Tissues (Sclera)", "Fat (Average Infiltrated)", "Fat (Not Infiltrated)", "Gall Bladder", "Gall Bladder Bile", "Heart", "Kidney", "Lens Cortex", "Lens Nucleus", "Liver", "Lung (Deflated)", "Lung (Inflated)", "Muscle", "Nerve", "Ovary", "Skin (Dry)", "Skin (Wet)", "Small Intestine", "Spleen", "Stomach", "Tendon", "Testis", "Thyroid", "Tongue", "Trachea", "Uterus", "Vitreous Humor"]
index_tissu=noms_tissu.index(input_choice)


def frequence(i):
        f=i*delta
        return f

def colecole(choix,low_range,high_range, round_step):
    n=index_tissu
    for i in np.arange(low_range,high_range, round_step):
        somme=ef[n]+delta1[n]/(1+(-j*w*frequence(i)*to1[n])**(1-alpha1[n]))
        somme=somme+delta2[n]/(1+(-j*w*frequence(i)*to2[n])**(1-alpha2[n]))
        somme=somme+delta3[n]/(1+(-j*w*frequence(i)*to3[n])**(1-alpha3[n]))
        somme=somme+delta4[n]/(1+(-j*w*frequence(i)*to4[n])**(1-alpha4[n]))
        somme=somme+((sig[n]*j)/(w*frequence(i)*epsilon0))
        epsi=somme.real
        M.append(epsi)
        sigblood=somme.imag*w*frequence(i)*epsilon0
        N.append(sigblood)
    return (M,N)


def optim (T,ST,V1,RLOI): # Température, Salinité, V1 entre 0 et 1, RLOI TRUE ==> Bottcher FALSE ==> Kra
    #Depuis programme colecole on suppose deux listes epsilon et sigma des tissus.
    EPS_Tissu, SIG_Tissu = colecole(input_choice, low_range_input, high_range_input,round_step_input)
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
            if RLOI:
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

#print(input_T,input_ST,input_V1,input_RLOI,input_choice,low_range_input,high_range_input,round_step_input)
print (optim(input_T, input_ST, input_V1, input_RLOI))
