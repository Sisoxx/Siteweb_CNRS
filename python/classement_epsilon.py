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
loi=2
fd=1
ff=6
pas=0.5
vs=40

fichier_texte = open("Liste2.txt","w")
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


fichier_texte.write("\n\n Tissus triés par constante diélectrique croissante à ")
fichier_texte.write(str(fd))
fichier_texte.write(" GHz : \n\n")

liste_moy = []


for n in noms_tissu:
    diff = []

    eColeCole,sColeCole = colecoleFonction(n,fd,ff,pas)
    mNaCl,mTx,mEau=calculmasse(t,st,v1,loi,n,fd,ff,pas,vs)
    premier = format(eColeCole[0], ".2f")
    premier = float(premier)
    pTx = mTx/(mNaCl+mEau+mTx)
    pTx = format(pTx, ".2f")
    pTx = float(pTx) * 100
    liste_moy.append([n,premier,pTx])


liste_moy.sort(key = lambda i: i[1])

numero = 1
for tissu in liste_moy:
    fichier_texte.write(str(numero))
    fichier_texte.write(" - ")
    fichier_texte.write(str(tissu[0]))
    fichier_texte.write(" - epsilon: ")
    fichier_texte.write(str(tissu[1]))
    fichier_texte.write("% - proportion masse Tx: ")
    pTx = float(pTx)
    pTx = format(pTx, ".2f")
    fichier_texte.write(str(tissu[2]))
    if float(tissu[2])>=40 and float(tissu[2])<=60 :
        fichier_texte.write("   Gélifié")
    fichier_texte.write("\n")
    numero +=1


fichier_texte.close()
