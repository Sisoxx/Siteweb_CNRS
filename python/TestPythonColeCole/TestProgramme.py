import math
import cmath

choix1="blood"
choix2="brain1"
somme=0
ef=0
j=cmath.sqrt(-1)
delta=0.5*10**9
epsilon0=1/(36*math.pi*10**9)
M=[]
N=[]

def frequence(i):
        f=i*delta
        return f

w=2*math.pi

def colecole(choix):
    if (choix=="blood"):
        for i in range (1,12):
            ef=4
            L=[56,8.377*10**-12,0.1,5200,132.629*10**-9,0.1,0.7,0,159.155*10**-6,0.200,0,15.915*10**-3,0]
            somme=ef+(L[0]/(1+(-j*w*frequence(i)*L[1]**(1-L[2]))))
            somme=somme+(L[3]/(1+(-j*w*frequence(i)*L[4]**(1-L[5]))))
            somme=somme+(L[7]/(1+(-j*w*frequence(i)*L[8]**(1-L[9]))))
            somme=somme+(L[10]/(1+(-j*w*frequence(i)*L[11]**(1-L[12]))))
            somme=somme+(L[6]/(j*w*frequence(i)*epsilon0))
            epsiblood=somme.real
            M.append(epsiblood)
            sigblood=somme.imag*w*epsilon0
            N.append(sigblood)
        return (M,N)

    if (choix=="brain1"):
        for i in range (1,12):
            ef=4
            L=[45.00,7.958*10**-12,0.100,400,15.915*10**-9,0.150,0.020,2.00*10**5,106.103*10**-6,0.220,4.50*10**7,5.305*10**-3,0.000]
            somme=ef+(L[0]/(1+(-j*w*frequence(i)*L[1]**(1-L[2]))))
            somme=somme+(L[3]/(1+(-j*w*frequence(i)*L[4]**(1-L[5]))))
            somme=somme+(L[7]/(1+(-j*w*frequence(i)*L[8]**(1-L[9]))))
            somme=somme+(L[10]/(1+(-j*w*frequence(i)*L[11]**(1-L[12]))))
            somme=somme+(L[6]/(j*w*frequence(i)*epsilon0))
            epsibrain1=somme.real
            M.append(epsibrain1)
            sigbrain1=somme.imag*w*frequence(i)*epsilon0
            N.append(sigbrain1)
        return (M,N)


print(colecole("brain1"))
