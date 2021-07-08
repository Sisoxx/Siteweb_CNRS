import sys
import math
import cmath
import statistics
from colecole import *
import numpy as np
from opti import *
from masse import *
from epsieau import EPSSIG

noms_tissu=["Aorta", "Bladder", "Blood", "Bone_Cancellous", "Bone_Cortical", "Bone_Marrow_Infiltrated", "Bone_Marrow_Not_Infiltrated", "Brain_Grey_Matter", "Brain_White_Matter", "Breast_Fat", "Cartilage", "Cerebellum", "Cerebro_Spinal_Fluid", "Cervix", "Colon", "Cornea", "Dura", "Eye_Tissues_Sclera", "Fat_Average_Infiltrated", "Fat_Not_Infiltrated", "Gall_Bladder", "Gall_Bladder_Bile", "Heart", "Kidney", "Lens_Cortex", "Lens_Nucleus", "Liver", "Lung_Deflated", "Lung_Inflated", "Muscle", "Nerve", "Ovary", "Skin_Dry", "Skin_Wet", "Small_Intestine", "Spleen", "Stomach", "Tendon", "Testis", "Thyroid", "Tongue", "Trachea", "Uterus", "Vitreous_Humor"]

t=25
st=0
v1=0.5
loi=1
fd=0.5
ff=6
pas=0.5
vs=40

fichier_texte = open("Liste_des_erreurs.txt","w")
fichier_texte.write("Paramètres: \n")
fichier_texte.write("t: ")
fichier_texte.write(str(t))
fichier_texte.write("   st: ")
fichier_texte.write(str(st))
fichier_texte.write("   v1: ")
fichier_texte.write(str(v1))
fichier_texte.write("  loi: ")
fichier_texte.write(str(loi))
fichier_texte.write("   freq_basse: ")
fichier_texte.write(str(fd))
fichier_texte.write("   freq_haute: ")
fichier_texte.write(str(ff))
fichier_texte.write("   pas: ")
fichier_texte.write(str(pas))
fichier_texte.write("   vs: ")
fichier_texte.write(str(vs))

fichier_texte.write("\n\n Tissus triés par erreur croissante des epsilons: \n\n")

liste_moy = []


for n in noms_tissu:
    diff = []

    eColeCole,sColeCole = colecoleFonction(n,fd,ff,pas)
    r1,r2,r3,r4,eOpti,sOpti=optiFonction(t,st,v1,loi,n,fd,ff,pas)
    mNaCl,mTx,mEau=calculmasse(t,st,v1,loi,n,fd,ff,pas,vs)
    for i in range(len(eColeCole)):
        diff.append((abs(eColeCole[i] - eOpti[i]))/eColeCole[i])
    moy = format(statistics.mean(diff),".2f")
    moy = float(moy) * 100
    moy = format(moy,".1f")
    min_diff = format(min(diff),".2f")
    min_diff = float(min_diff) * 100
    min_diff = format(min_diff,".1f")
    max_diff = format(max(diff), ".2f")
    max_diff = float(max_diff) * 100
    max_diff = format(max_diff, ".1f")
    mNaCl = format(mNaCl,".2f")
    mNaCl = float(mNaCl)
    mTx = format(mTx,".2f")
    mTx = float(mTx)
    mEau = format(mEau,".2f")
    mEau = float(mEau)
    pTx = mTx/(mNaCl+mEau+mTx)
    pTx = format(pTx, ".2f")
    pTx = float(pTx) * 100
    pTx = format(pTx, ".1f")

    liste_moy.append([n,moy,min_diff,max_diff,pTx])

liste_moy.sort(key = lambda i: i[1])

numero = 1
for tissu in liste_moy:
    fichier_texte.write(str(numero))
    fichier_texte.write(" - ")
    fichier_texte.write(str(tissu[0]))
    fichier_texte.write(" - err_moy: ")
    fichier_texte.write(str(tissu[1]))
    fichier_texte.write("% - e_min:")
    fichier_texte.write(str(tissu[2]))
    fichier_texte.write("% - e_max:")
    fichier_texte.write(str(tissu[3]))
    fichier_texte.write("% - proportion masse Tx:")
    fichier_texte.write(str(tissu[4]))
    fichier_texte.write("%")
    if float(tissu[4])>40:
        fichier_texte.write("   Gélifié")
    fichier_texte.write("\n")
    numero +=1

fichier_texte.write("\n\n Tissus triés par erreur croissante des sigmas: \n\n")

liste_moy_sig = []

for n in noms_tissu:
    diff = []

    eColeCole,sColeCole = colecoleFonction(n,fd,ff,pas)
    r1,r2,r3,r4,eOpti,sOpti=optiFonction(t,st,v1,loi,n,fd,ff,pas)
    mNaCl,mTx,mEau=calculmasse(t,st,v1,loi,n,fd,ff,pas,vs)
    for i in range(len(sColeCole)):
        diff.append((abs(sColeCole[i] - sOpti[i]))/sColeCole[i])
    moy = format(statistics.mean(diff),".2f")
    moy = float(moy) * 100
    moy = format(moy,".1f")
    min_diff = format(min(diff),".2f")
    min_diff = float(min_diff) * 100
    min_diff = format(min_diff,".1f")
    max_diff = format(max(diff), ".2f")
    max_diff = float(max_diff) * 100
    max_diff = format(max_diff, ".1f")
    mNaCl = format(mNaCl,".2f")
    mNaCl = float(mNaCl)
    mTx = format(mTx,".2f")
    mTx = float(mTx)
    mEau = format(mEau,".2f")
    mEau = float(mEau)
    pTx = mTx/(mNaCl+mEau+mTx)
    pTx = format(pTx, ".2f")
    pTx = float(pTx) * 100
    pTx = format(pTx, ".1f")
    liste_moy_sig.append([n,moy,min_diff,max_diff,pTx])

liste_moy_sig.sort(key = lambda i: i[1])

numero = 1
for tissu in liste_moy_sig:
    fichier_texte.write(str(numero))
    fichier_texte.write(" - ")
    fichier_texte.write(str(tissu[0]))
    fichier_texte.write(" - err_moy: ")
    fichier_texte.write(str(tissu[1]))
    fichier_texte.write("% - e_min:")
    fichier_texte.write(str(tissu[2]))
    fichier_texte.write("% - e_max:")
    fichier_texte.write(str(tissu[3]))
    fichier_texte.write("% - proportion masse Tx:")
    fichier_texte.write(str(tissu[4]))
    fichier_texte.write("%")
    if float(tissu[4])>40:
        fichier_texte.write("   Gélifié")
    fichier_texte.write("\n")
    numero +=1


fichier_texte.close()
