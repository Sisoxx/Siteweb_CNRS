import math
import cmath
import numpy as np
from ProgrammeEpsig import EPSSIG
from numpy.linalg import inv




def optim (T,ST,V1):

    #Depuis programme colecole on suppose deux listes epsilon et sigma des tissus.
    EPS_Tissu = [12.946, 12.606, 12.363, 12.162, 11.981, 11.813, 11.654, 11.5, 11.352, 11.207, 11.066]
    SIG_Tissu = [0.100, 0.126, 0.155, 0.189, 0.226, 0.267, 0.310, 0.356, 0.404, 0.454, 0.506]
    NFRE = len(EPS_Tissu) - 1
   # print("NFRE = ",NFRE)
    #Triton X100 Lazebnik
    DELTA = 1.6
    TAU = 13.56 * 1e-12
    EPSINF = 3.14
    SIG0 = 0.036

    FREQMI = 1e9
    PASFRE = 0.25e9

    HES = 0


    #Calcul différentes constantes - Initialisation
    V2 = 1 - V1
    S = ST/V2
   # print ("ST  et V2: ",ST/V2)
    EPFACT = 1e-9/(36*math.pi)
    N = 0
    F1 = 0
    F01 = 10
    SOMEPS = 0
    EPSTISSU = []
    X1 = 0
    X2 = 0
    #Création de l'epsilon total du tissu - VALIDE
    for i in range (0,2):
        FREQ = FREQMI + i*PASFRE
        OMEGA = 2 * math.pi * FREQ
        EPSTISSU.append(complex(EPS_Tissu[i],SIG_Tissu[i] / (OMEGA * EPFACT)))
        SOMEPS = SOMEPS + abs(EPSTISSU[i])**2

    while  (N <1):
       # print ("ST  et V2: ",ST/V2)

        F1 = F01
        F01 = 0
        GRAD1 = 0
        GRAD2 = 0
       # HES = np.array([[0,0],
                  #     [0,0]], dtype=float)
        HESINV = np.array([[0,0],
                           [0,0]], dtype=float)
        EPSOL = []
        SIGSOL = []
        M = 0
        #Calcul propriétés diélectriques des tissus
        for i in range (0,2):
            #print ("ST  et V2: ",ST/V2)

            FREQ = FREQMI+ i*PASFRE
            OMEGA = 2 * math.pi * FREQ #OMEGA Validé

            #Calcul propriétés diélectriques du TX100
            YTX = OMEGA * TAU
            EPSITX = YTX * DELTA / (1 + YTX**2) + SIG0 / (OMEGA * EPFACT)
            EPSRTX = EPSINF + DELTA / (1 + YTX**2)
            #print ("epsitx", EPSITX)
            #print ("epsrtx", EPSRTX)

            #Les deux sont validés


            #Calcul propriétés diélectriques de l'eau et de ses dérivé en fonction de sa salinité
            a,b,c = EPSSIG(T, FREQ, S)
            EPSEAU = complex(a,b)
            EPS2 = EPSEAU
            EPSTX = complex(EPSRTX,EPSITX)
            EPS1 = EPSTX
            #print ("epseau",EPS2)
            #print ("epspri", c)
            #print ("eps1",EPS1)

            #print ("parametros : ",T,FREQ,S)
           # print(EPSSIG(T, FREQ, S))

            #Calcul par Kraszweski
            R1 = cmath.sqrt(EPS1)
            R2 = cmath.sqrt(EPS2)
            LOGEPS = (R1+V2*(R2-R1))**2
            A = cmath.sqrt(EPS1 * EPS2)
            B = cmath.sqrt(EPS1 / EPS2)
         #   print ("A", A)
          #  print ("B", B)
            DFDV = 2 * (A-EPS1 + V2 * (EPS1 + EPS2 -2 * A))
            DEMDE2 = V2 * B + (1-B) * V2**2
           # print ("DFDV", DFDV)
           # print ("DEMDE2", DEMDE2)

            #Récupération des résultats
            EPSRM = LOGEPS.real
            SIGRM = LOGEPS.imag * OMEGA * EPFACT
            EPSOL.append(EPSRM)
            SIGSOL.append(SIGRM)
            DFDS = DEMDE2 * c/V2
           # print("DFDS :", DFDS)
            FI = LOGEPS - EPSTISSU[i]
            #COR = EPSRM - EPS_Tissu[i]
            #COI = SIGRM - SIG_Tissu[i]
            W = 1 / abs(EPSTISSU[i])**2
           # print("W : ", W)
            #print("FI :", FI)

            F01 = W * abs(FI)**2 + F01
            print("F01 :",F01)
            GRAD1 = GRAD1 + 2 * W * (DFDS * FI.conjugate()).real
           # print ("grad1",GRAD1)

            GRAD2 = GRAD2  +2 * W * (DFDV * FI.conjugate()).real
            #print ("grad2",GRAD2)
            M = M + 2
           # print("M : ",M)
           # print("HES :", HES)
            print("DFDS :",abs(DFDS))
            HES= HES + 2 * W * abs(DFDS)**2

           # print("HES :", HES)

           # aa = DFDS * DFDV.conjugate()
           # HES[0,1] = HES[0,1] + 2 * W * aa.real
           # bb = DFDV * DFDS.conjugate()
           # HES[1,0] = HES[1,0] + 2 * W * bb.real
           # HES[1,1] = HES[1,1] + 2 * W * abs(DFDV)**2
           # print("HES :", HES)
            #Inversion Matrice
            #DETHES=(HES[0,0]*HES[1,1])-(HES[0,1]*HES[1,0])
          #  print(("DETHES :", DETHES))
           # HESINV[0,0]=HES[1,1] / DETHES
            #HESINV[1,1]=HES[0,0] / DETHES
           # HESINV[0,1]= -HES[0,1] / DETHES
           # HESINV[1,0]= -HES[1,0] / DETHES
           # HESINV2 = inv(HES)
            #print("HES Inv :", HESINV)
            X1 = X1 -(HESINV[0,0] * GRAD1 + HESINV[0,1] * GRAD2)
            X2 = X2 -(HESINV[1,1] * GRAD2 + HESINV[1,0] * GRAD1)
            S = X1
            #print ("s",S)
            V2 = X2
            V1 = 1 - V2
            ST = S * V2
        N = N + 1
        #F1
            #F02 = F01/SOMEPS
            #FO3 = math.sqrt(F02)
        print(N)

    return(S,V2,F01)

print (optim(25, 0, 0.5))
