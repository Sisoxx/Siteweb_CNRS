import sys
import math
import cmath
from colecole import *
import numpy as np
from opti import *
from masse import *
from epsieau import EPSSIG

#
# try:
#     input_T = float(sys.argv[1])
# except:
#     print("il manque un argument 1")
# try:
#     input_ST = float(sys.argv[2])
# except:
#     print("il manque un argument 2")
# try:
#     input_V1 = float(sys.argv[3])
# except:
#     print("il manque un argument 3")
# try:
#     input_RLOI = int(sys.argv[4])
# except:
#     print("il manque un argument 4  ")
# try:
#     input_choice = sys.argv[5]
# except:
#     print("il manque un argument 5")
# try:
#     low_range_input = float(sys.argv[6])
# except:
#     print("il manque un argument 6")
# try:
#     high_range_input = float(sys.argv[7])
# except:
#     print("il manque un argument 7")
# try:
#     round_step_input = float(sys.argv[8])
# except:
#     print("il manque un argument 8")



noms_tissu=["Aorta", "Bladder", "Blood", "Bone_Cancellous", "Bone_Cortical", "Bone_Marrow_Infiltrated", "Bone_Marrow_Not_Infiltrated", "Brain_Grey_Matter", "Brain_White_Matter", "Breast_Fat", "Cartilage", "Cerebellum", "Cerebro_Spinal_Fluid", "Cervix", "Colon", "Cornea", "Dura", "Eye_Tissues_Sclera", "Fat_Average_Infiltrated", "Fat_Not_Infiltrated", "Gall_Bladder", "Gall_Bladder_Bile", "Heart", "Kidney", "Lens_Cortex", "Lens_Nucleus", "Liver", "Lung_Deflated", "Lung_Inflated", "Muscle", "Nerve", "Ovary", "Skin_Dry", "Skin_Wet", "Small_Intestine", "Spleen", "Stomach", "Tendon", "Testis", "Thyroid", "Tongue", "Trachea", "Uterus", "Vitreous_Humor"]

liste_erreurs_neg = []
liste_erreurs_grandes = []

fichier_texte = open("Liste_des_erreurs.txt","w")
fichier_texte.write("Tissus présentant des erreurs: \n\n\n")
fichier_texte.write("\n\nListe des tissus présentant des masses négatives de sel: \n")

t=25
st=0
v1=0.5
loi=1
fd=0.5
ff=6
pas=0.5
vs=40

for n in noms_tissu:
    N,a,b,c=optiFonction(t,st,v1,loi,n,fd,ff,pas)
    NaCl,T,o=calculmasse(t,st,v1,loi,n,fd,ff,pas,vs)
    sous_liste = [n,c,NaCl,T,o]

    if NaCl < 0 :
        liste_erreurs_neg.append([n,N,c,NaCl])
        sous_liste = str(str(n)+ "  Erreur : "+ str(c)+ "  Masse sel : "+ str(NaCl) +" g  Masse Triton-X : " +str(T)+ " g  Volume d'eau : " + str(o) + " mL")
        fichier_texte.write(sous_liste)
        fichier_texte.write("\n")

fichier_texte.write("\n\nListe des tissus présentant des erreurs superieurs à 10^-1: \n")

for n in noms_tissu:
    N,a,b,c=optiFonction(t,st,v1,loi,n,fd,ff,pas)
    NaCl,T,o=calculmasse(t,st,v1,loi,n,fd,ff,pas,vs)
    sous_liste = [n,c,NaCl,T,o]

    if c > 0.15:
        liste_erreurs_grandes.append([n,N,c,NaCl])
        sous_liste = str(str(n)+ "  Erreur : "+ str(c)+ "  Masse sel : "+ str(NaCl) +" g  Masse Triton-X : " +str(T)+ " g  Volume d'eau : " + str(o) + " mL")
        fichier_texte.write(sous_liste)
        fichier_texte.write("\n")



fichier_texte.write("\n")
fichier_texte.write("Nombre de tissus total: ")
l=str(len(noms_tissu))
fichier_texte.write(l)
fichier_texte.write("\n")
fichier_texte.write("Nombre de tissus présentant une erreur: ")
l=str(len(liste_erreurs_neg) +len(liste_erreurs_grandes))
fichier_texte.write(l)

fichier_texte.close()
