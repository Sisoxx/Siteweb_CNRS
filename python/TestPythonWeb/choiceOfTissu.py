import sys

#import os
#import urllib.parse

#sent_query = os.environ['QUERY_STRING']
#query_list = sent_query.split('=')
#query_dict = urllib.parse.parse_qs(os.environ['QUERY_STRING'])

input_choice = sys.argv[1]

def choiceOfTissu ( choice ):
    return ('Hello, you chose ' + str(choice))

#input_choice = str(query_dict['choice'])[2:-2] #Not sure about that -> [2:-2]

#self.send_header('content-type', 'text/html')
#self.wfile.write(choiceOfTissu(input_choice).encode())


#print("Content-Type: text/html\n")
print("\n\n")
print(str(choiceOfTissu(input_choice)))
