import math
import cmath
import sys

input_choice = sys.argv[1]

choix0="Blood"
choix1="brain1"
somme=0
j=cmath.sqrt(-1)
delta=0.5*10**9
epsilon0=1/(36*math.pi*10**9)
M=[]
N=[]
w=2*math.pi

#print (a)


ef=[4, 4, 4, 2.5, 2.5, 4, 4, 4, 4, 4, 2.5]
delta1=[56, 45, 32, 3, 10, 50, 50, 32, 65, 26, 18,]
to1=[8.377, 7.958, 7.958, 17.68, 13.263, 7.958, 7.234, 7.958, 7.958, 7.958, 7.958]
to1=[e*10**(-12) for e in to1]
alpha1=[0.1, 0.1, 0.1, 0.1, 0.2, 0.1, 0.1, 0.1, 0.1, 0.1, 0.1]

delta2=[5200, 400, 100, 15, 180, 1200, 7000, 280, 40, 500, 500]
to2=[132.629, 15.915, 7.958, 63.66, 79.577, 159.155, 353.678, 79.577, 1.592, 106.103, 63.662]
to2=[e*10**(-9) for e in to2]
alpha2=[0.1, 0.15, 0.1, 0.1, 0.2, 0.05, 0.1, 0, 0, 0.15, 0.1]

sig=[0.7, 0.02, 0.02, 0.01, 0.02, 0.05, 0.2, 0, 2, 0.006, 0.03]

delta3=[0, 20, 4, 5, 0.5, 45, 120, 3, 0, 7, 25.]
delta3=[e*10**4 for e in delta3]
to3=[159.155, 106.103, 53.052, 454.7, 159.155, 72.343, 318.310, 1.592, 159.155, 15.915, 159.155]
to3=[e*10**(-6) for e in to3]
alpha3=[0.2, 0.22, 0.3, 0.1, 0.2, 0.220, 0.1, 0.16, 0, 0.2, 0.2]

delta4=[0, 4.5, 3.5, 2, 0.01, 2.5, 2.5, 0.003, 0, 4, 4,]
delta4=[e*10**7 for e in delta4]
to4=[15.915, 5.305, 7.958, 13.2, 15.915, 4.547, 2.274, 1.592, 15.915, 15.915, 7.958]
to4=[e*10**(-3) for e in to4]
alpha4=[0, 0, 0.02, 0, 0, 0, 0, 0.2, 0, 0, 0]

def frequence(i):
        f=i*delta
        return f

def colecole(choix):
    if (choix=="Blood"):
        for i in range (1,12):
            somme=ef[0]+delta1[0]/(1+(-j*w*frequence(i)*to1[0])**(1-alpha1[0]))
            somme=somme+delta2[0]/(1+(-j*w*frequence(i)*to2[0])**(1-alpha2[0]))
            somme=somme+delta3[0]/(1+(-j*w*frequence(i)*to3[0])**(1-alpha3[0]))
            somme=somme+delta4[0]/(1+(-j*w*frequence(i)*to4[0])**(1-alpha4[0]))
            somme=somme+((sig[0]*j)/(w*frequence(i)*epsilon0))
            epsiblood=somme.real
            M.append(epsiblood)
            sigblood=somme.imag*w*frequence(i)*epsilon0
            N.append(sigblood)
        return (M,N)
    else:
        return "\n Erreur, choisissez Blood svp"

print (colecole(input_choice))
