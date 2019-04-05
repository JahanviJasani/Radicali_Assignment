from flask import Flask, request, jsonify

app = Flask(__name__)

text0 = "A paragraph is a group of words put together to form a group that is usually longer than a sentence."
text1 = "A paragraph is a self-contained unit of a discourse in writing dealing with a particular point or idea."
text2 = "Paragraphs are usually an expected part of formal writing, used to organize longer prose."
 
@app.route("/backend", methods = ['POST', 'GET'])

def backend():
	if request.method == 'POST':
		message = request.get_json(force=True)
		if message['element'] == "text0":
			global text0
			text0 = message['changes']
		elif message['element'] == "text1":
			global text1
			text1 = message['changes']
		elif message['element'] == "text2":
			global text2
			text2 = message['changes']
		response = {'text0':text0, 'text1':text1,'text2':text2}
		return jsonify(response)
	else:
		response = {'text0':text0, 'text1':text1,'text2':text2}
		return jsonify(response)