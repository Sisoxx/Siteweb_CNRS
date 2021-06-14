import sys
import math
import cmath
from colecole import *
import numpy as np
from optiBACKUP2 import optim
from epsieau import EPSSIG

print("hello")

try:
    input_T = float(sys.argv[1])
except:
    print("il manque un argument")
try:
    input_ST = float(sys.argv[2])
except:
    print("il manque un argument")
try:
    input_V1 = float(sys.argv[3])
except:
    print("il manque un argument")
try:
    input_RLOI = bool(sys.argv[4])
except:
    print("il manque un argument")
try:
    input_choice = sys.argv[5]
except:
    print("il manque un argument")
try:
    low_range_input = float(sys.argv[6])
except:
    print("il manque un argument")
try:
    high_range_input = float(sys.argv[7])
except:
    print("il manque un argument")
try:
    round_step_input = float(sys.argv[8])
except:
    print("il manque un argument")


print (optiFonction(input_T, input_ST, input_V1, input_RLOI, input_choice, low_range_input, high_range_input,round_step_input))

print("hello")
