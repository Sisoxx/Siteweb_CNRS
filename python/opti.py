import math
import cmath
from colecole import *
from epsieau import EPSSIG

def optiFonction(T,ST,V1,RLOI,input_choice, low_range_input, high_range_input,round_step_input):
    EPS_Tissu, SIG_Tissu = colecoleFonction(input_choice, low_range_input, high_range_input,round_step_input)
    NFRE = len(EPS_Tissu)

    # DELTA = 2.14
    # TAU = 30.2 * 1e-12
    # EPSINF = 3.35
    # SIG0 = 0.1

    DELTA = 2.58
    TAU = 41.6 * 1e-12
    EPSINF = 3.51
    SIG0 = 0.066

    FREQMI = low_range_input* 1e9
    PASFRE = round_step_input * 1e9

    V2 = 1 - V1
    S = ST/V2
    EPFACT = 1e-9/(36*math.pi)
    N = 0
    F02 = 1
    F02_avant = 2
    SOMEPS = 0
    EPSTISSU = []
    X1 = S
    X2 = V2

    for i in range (0,NFRE):
        FREQ = FREQMI + i*PASFRE
        OMEGA = 2 * math.pi * FREQ
        EPSTISSU.append(complex(EPS_Tissu[i],SIG_Tissu[i] / (OMEGA * EPFACT)))
        SOMEPS = SOMEPS + abs(EPSTISSU[i])**2

    while  (N < 20):

        if abs(F02-F02_avant)<= 0.00000001:
            break
        F02_avant = F02
        F01 = 0
        GRAD1 = 0
        GRAD2 = 0

        HES00 = 0
        HES01 = 0
        HES10 = 0
        HES11 = 0

        HESINV00 = 0
        HESINV01 = 0
        HESINV10 = 0
        HESINV11 = 0

        EPSOL = []
        SIGSOL = []

        for i in range (0,NFRE):
            FREQ = FREQMI+ i*PASFRE
            OMEGA = 2 * math.pi * FREQ

            YTX = OMEGA * TAU
            EPSITX = YTX * DELTA / (1 + YTX**2) + SIG0 / (OMEGA * EPFACT)
            EPSRTX = EPSINF + DELTA / (1 + YTX**2)
            a,b,c = EPSSIG(T,FREQ,S)
            EPSEAU = complex(a,b)
            EPS2 = EPSEAU
            EPSTX = complex(EPSRTX,EPSITX)
            EPS1 = EPSTX
            if RLOI == 1:
                A = 2
                B = EPS2 - 2 * EPS1 - 3 * V2 * (EPS2 - EPS1)
                C = -1 * EPS2 * EPS1
                DET = cmath.sqrt(B**2 - 4 * A * C)
                LOGEPS = (-1 * B + DET) / (2 * A)
                DFDV = 0.75 * (EPS2 - EPS1) * (1 - B / DET)
                DEMDE2 = (3 * V2 - 1) / 4 + ((1 - 3 * V2) * B + 4 * EPS1) / (4 * DET)

            else :
                R1 = cmath.sqrt(EPS1)
                R2 = cmath.sqrt(EPS2)
                LOGEPS = (R1+V2*(R2-R1))**2
                A = cmath.sqrt(EPS1 * EPS2)
                B = cmath.sqrt(EPS1 / EPS2)
                DFDV = 2 * (A - EPS1 + V2 * (EPS1 + EPS2 - 2 * A))
                DEMDE2 = V2 * B + (1-B) * V2**2

            EPSRM = LOGEPS.real
            SIGRM = LOGEPS.imag * OMEGA * EPFACT
            EPSOL.append(EPSRM)
            SIGSOL.append(SIGRM)
            DFDS = DEMDE2 * c/V2
            FI = LOGEPS - EPSTISSU[i]
            W = 1 / abs(EPSTISSU[i])**2

            F01 = abs(FI)**2 + F01
            GRAD1 = GRAD1 + 2 * W * (DFDS * FI.conjugate()).real
            GRAD2 = GRAD2  + 2 * W * (DFDV * FI.conjugate()).real
            HES00 = HES00 + 2 * W * abs(DFDS)**2
            HES01 = HES01 + 2 * W  * (DFDS * DFDV.conjugate()).real
            HES10 = HES10 + 2 * W * (DFDV * DFDS.conjugate()).real
            HES11 = HES11 + 2 * W * abs(DFDV)**2

        DETHES = (HES00 * HES11) - (HES01 * HES10)
        HESINV00 = HES11 / DETHES
        HESINV11 = HES00 / DETHES
        HESINV01 = (-1 * HES01) / DETHES
        HESINV10 = (-1 * HES10) / DETHES
        X1 = X1 - (HESINV00 * GRAD1 + HESINV01 * GRAD2)
        X2 = X2 - (HESINV11 * GRAD2 + HESINV10 * GRAD1)
        S = X1
        V2 = X2
        V1 = 1 - V2
        ST = S * V2

        if ST < 0:
            ST = 0
        N = N + 1
        F02 = F01 / SOMEPS
        if V1 > 1:
            V1 = 1

    return(N,ST,V1,F02,EPSOL,SIGSOL)
