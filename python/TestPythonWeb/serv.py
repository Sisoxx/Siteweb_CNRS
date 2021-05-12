'''
Sur Mac, il faut aller dans le terminal, aller dans le bon dossier (cd),
puis entrer: python serv.py pour run le serveur,
ensuite afficher la page avec l'URL: http://localhost:8000/

'''


from http.server import HTTPServer, BaseHTTPRequestHandler


class helloHandler(BaseHTTPRequestHandler):
    def do_GET(self):
        if self.path == '/':
            self.path = '/test.html'
        try:
            file_to_open = open(self.path[1:]).read()
            self.send_response(200)
        except:
            file_to_open = "File not found"
            self.send_response(404)
        self.end_headers()

        #self.send_response(200)
        self.send_header('content-type', 'text/html')
        #self.end_headers()
        #self.wfile.write('Hello Octopus'.encode())
        self.wfile.write(bytes(file_to_open, 'utf-8'))
        print("salut")



def main():
    PORT = 8000
    server = HTTPServer(('', PORT ), helloHandler)
    print('Server running on port %s' % PORT)
    server.serve_forever()

if __name__ == '__main__':
    main()


"""
%%class Serv(BaseHTTPRequestHandler):

    def do_GET(self):
        if self.path == '/':
            self.path = '/index.html'
        try:
            file_to_open = open(self.path[1:]).read()
            self.send_response(200)
        except:
            file_to_open = "File not found"
            self.send_response(404)
        self.end_headers()
        self.wfile.write(bytes(file_to_open, 'utf-8'))


httpd = HTTPServer(('localhost', 8080), Serv)
httpd.serve_forever()
"""
