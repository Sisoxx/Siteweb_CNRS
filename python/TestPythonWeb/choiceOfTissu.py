import os
import urllib.parse


sent_query = os.environ['QUERY_STRING']
query_list = sent_query.split('=')
query_dict = urllib.parse.parse_qs(osenviron['QUERY_STRING'])

def choiceOfTissu ( choice ):
    return ('Hello, you chose' + str(choice))

input_choice = str(query_dict['choice'])[2:-2] #Not sure about that -> [2:-2]

self.wfile.write(choiceOfTissu(input_choice).encode())
