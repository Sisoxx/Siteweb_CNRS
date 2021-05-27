import math
import cmath
import numpy as np
from ProgrammeEpsig import EPSSIG
from numpy.linalg import inv



def optim (T,ST,V1):

    #Depuis programme colecole on suppose deux listes epsilon et sigma des tissus.
    EPS_Tissu = []
    SIG_Tissu = []
    NFRE = len(EPS_Tissu)

    #Calcul différentes constantes - Initialisation
    V2 = (1 - V1)
    S = ST/V2
    EPFACT = 1e-9/(36*math.pi)
    N = 0
    X1 = 0
    X2  = V2
    F1 = 1e10
    NCOND1 = 0
    NCOND2 = 0
    F01 = 0
    GRAD1 = 0
    GRAD2 = 0
    HES = np.array([[0,0],
                   [0,0]])
    SOMEPS = 0
    FREQMI = 1e9
    PASFRE = 0.25e9
    EPSTISSU = []
    EPSOL = []
    SIGSOL = []

    #Triton X100 Lazebnik
    DELTA = 1.6
    TAU = 13.56 * 1e-12
    EPSINF = 3.14
    SIG0 = 0.036

    #Création de l'epsilon total du tissu
    for i in range (1,NFRE):
        FREQ = FREQMI + (i-1)*PASFRE
        OMEGA = 2 * math.pi * FREQ
        EPSTISSU.append(complex(EPS_Tissu[i],SIG_Tissu[i]) / OMEGA * EPFACT)
        SOMEPS = SOMEPS + abs(EPSTISSU[i])**2

    #Calcul propriétés diélectriques des tissus
    for i in range (1,NFRE):
        FREQ = FREQMI+ (i-1)*PASFRE
        OMEGA = 2 * math.pi * FREQ

        #Calcul propriétés diélectriques du TX100
        YTX = OMEGA * TAU
        EPSITX = YTX * DELTA / (1 + YTX**2) + SIG0 / (OMEGA * EPFACT)
        EPSRTX = EPSINF + DELTA / (1 + YTX**2)

        #Calcul propriétés diélectriques de l'eau et de ses dérivé en fonction de sa salinité
        a,b,c = EPSSIG(T, FREQ, S)
        EPSEAU = complex(a,b)
        EPS2 = EPSEAU
        EPSTX = complex(EPSRTX,EPSITX)
        EPS1 = EPSTX

        #Calcul par Kraszweski
        R1 = cmath.sqrt(EPS1)
        R2 = cmath.sqrt(EPS2)
        LOGEPS = (R1+V2*(R2-R1))**2
        A = cmath.sqrt(EPS1 * EPS2)
        B = cmath.sqrt(EPS1 / EPS2)
        DFDV = 2 * (A-EPS1 + V2 * (EPS1 + EPS2 -2 * A))
        DEMDE2 = V2 * B + (1-B) * V2**2

        #Récupération des résultats
        EPSRM = LOGEPS.real
        SIGRM = LOGEPS.imag * OMEGA * EPFACT
        EPSOL.append(EPSRM)
        SIGSOL.append(SIGRM)
        DFDS = DEMDE2 * c/V2
        FI = LOGEPS - EPSTISSU[i]
        COR = EPSRM - EPS_Tissu[i]
        COI = SIGRM - SIG_Tissu[i]
        W = 1 / abs(EPSTISSU[i])**2

        F01 = W * abs(FI)**2
        GRAD1 = 2 * W * (DFDS * FI.conjugate()).real
        GRAD2 = 2 * W * (DFDV * FI.conjugate()).real
        HES[1,1] = 2 * W * abs(DFDS)**2
        HES[1,2] = 2 * W (DFDS * DFDV.conjugate()).real
        HES[2,1] = 2 * W (DFDV * DFDS.conjugate()).real
        HES[2,2] = 2 * W * abs(DFDV)**2

        #Inversion Matrice
        HESINV = inv(HES)
        X1 = -(HESINV[1,1] * GRAD1 + HESINV[1,2] * GRAD2)
        X2 = -(HESINV[2,2] * GRAD2 + HESINV[2,1] * GRAD1)
        S = X1
        V2 = X2
        V1 = 1 - V2
        ST = S * V2
        N = N + 1
       #F02 = F01/SOMEPS
        FO3 = math.sqrt(F02)
