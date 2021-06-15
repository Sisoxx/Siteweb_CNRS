import sys
import math
import cmath
from colecole import *
import numpy as np
from opti import *
from epsieau import EPSSIG


try:
    input_T = float(sys.argv[1])
except:
    print("il manque un argument 1")
try:
    input_ST = float(sys.argv[2])
except:
    print("il manque un argument 2")
try:
    input_V1 = float(sys.argv[3])
except:
    print("il manque un argument 3")
try:
    input_RLOI = int(sys.argv[4])
except:
    print("il manque un argument 4  ")
try:
    input_choice = sys.argv[5]
except:
    print("il manque un argument 5")
try:
    low_range_input = float(sys.argv[6])
except:
    print("il manque un argument 6")
try:
    high_range_input = float(sys.argv[7])
except:
    print("il manque un argument 7")
try:
    round_step_input = float(sys.argv[8])
except:
    print("il manque un argument 8")


print (optiFonction(input_T, input_ST, input_V1, input_RLOI, input_choice, low_range_input, high_range_input,round_step_input))
