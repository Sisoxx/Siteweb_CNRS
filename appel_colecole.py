from colecole import frequence, colecoleFonction
import sys


try :
    input_choice = sys.argv[1]
    low_range_input = float(sys.argv[2])
    high_range_input = float(sys.argv[3])
    round_step_input = float(sys.argv[4])
except:
    print("erer")


print (colecoleFonction(input_choice,low_range_input,high_range_input,round_step_input))
