import cmath
import math

def EPSSIG(T,F,S):
    w = 2*math.pi*F
    EOS =8.85434E-12
    EINF = 5.77 - 0.0274 * T

    N = S*(1.707e-2 + 1.205e-5*S + 4.058e-9*S**2)
    DNDS = 1.707e-2 + 2*1.205e-5*S + 3*4.085e-9*S**2
    N2 = N**2
    N3 = N2*N
    N4 = N3*N
    T2 = T**2
    T3 = T2*T
    D = 25-T
    D2 = D**2

    ET = 87.79*math.exp(-0.00455*T)
    TT = 1.1109e-10 - 3.824e-12*T + 6.938e-14*T2 - 5.096e-16*T3

    AN = 1 - 0.2551 * N + 5.151e-2 * N2 - 6.889e-3 * N3
    ANPRIM = -0.2551 + 2*5.151e-2 * N - 3 * 6.889e-3 * N2
    BNT = 1 + 0.1463e-2 * N * T - 0.04896 * N - 0.02967 * N2 + 5.644e-3 * N3
    BNTPRIM = 0.1463e-2 * T - 0.04896 - 2 * 0.02967 * N + 3 * 5.644e-3 * N2
    ETN = ET * AN
    ETNPRIM = ET * ANPRIM
    TTN = TT * BNT
    TTNPRIM = TT * BNTPRIM

    SU1 = 10.394 - 2.3776 * N + 0.68258 * N2 - 0.13538 * N3 + 1.0086e-2 * N4
    SU1PRIM = -2.3776 + 2 * 0.68258 * N - 3 * 0.13538 * N2 + 4* 1.0086e-2 * N3
    SN25 = N*SU1
    SN25PRIM = N * SU1PRIM + SU1
    XTEMP = 3.020e-5 + 3.922e-5 * D + N * (1.721e-5 - 6.584e-6 * D)
    SU2 = 1 - 1.962e-2 * D + 8.08e-5 * D2 - D * N * XTEMP
    SU2PRIM = -1 * D * (N * (1.721e-5 - 6.584e-6 *D) + XTEMP)
    STN = SN25 * SU2
    STNPRIM = SN25PRIM * SU2 + SN25 * SU2PRIM

    DEN = 1 + (F * TTN)**2
    DENPRIM = 2 * F**2 * TTN * TT * BNTPRIM
    DC = EINF + (ETN-EINF) / DEN
    EPSRPRIM = (ETNPRIM * DEN - DENPRIM * (ETN - EINF)) / DEN**2
    EPSR = DC

    EPSI = STN / (w*EOS)+ F * TTN * (ETN-EINF) / DEN
    EPSIPRIM = STNPRIM / (w * EOS) + F * (TTNPRIM * (ETN-EINF) / DEN + TTN * EPSRPRIM)
    EPSPRI = DNDS * complex(EPSRPRIM,EPSIPRIM)

    return (EPSR, EPSI, EPSPRI)
