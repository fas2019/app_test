from flask import Flask
from flask import render_template, request
import pymysql
from flask_sqlalchemy import SQLAlchemy
import time
#import models

ahora = time.strftime("%x %X")


app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///cavalli.db'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
app.secret_key = 'MYBODYHURTS'
db = SQLAlchemy(app)


@app.route('/')
def home():
    return render_template('index.html', title = "Home")



@app.route('/personas', methods=['POST'])
def personas():
	usuario = request.form['usuario']
	local = request.form['local']
	Producto= request.form['producto']
	Cantidad = request.form['Cantidad']
	Importe_Dolar = request.form['Importe_Dolar']
	TC = request.form['TC']


	Fecha=ahora
	Pesos=round(float(Importe_Dolar)*float(TC),2)
	pesos_unidad=round((float(Importe_Dolar)/float(Cantidad))*float(TC),2)

	db = pymysql.connect(host="",user="",password="",db="", port=)

	cursor = db.cursor()

	sql = "INSERT INTO Orlando (usuario,local,Producto, Cantidad, Importe_Dolar, TC,Fecha,Pesos,pesos_unidad) VALUES ('{0}','{1}','{2}','{3}','{4}','{5}','{6}','{7}','{8}')".format(usuario,local, Producto,Cantidad, Importe_Dolar,TC,Fecha,Pesos,pesos_unidad)

	print(sql)

	try:

		cursor.execute(sql)
		db.commit()

	except:

		db.rollback()

	db.close()

	return render_template('pass.html')


@app.route('/productos', methods=['POST'])
def productos():
	Producto = request.form['Producto']
	modelo = request.form['modelo']
	medida= request.form['medida']


	db = pymysql.connect(host="",user="",password="",db="", port=)

	cursor = db.cursor()

	sql = "INSERT INTO Productos (Producto,modelo,medida) VALUES ('{0}','{1}','{2}')".format(Producto,modelo,medida)

	print(sql)

	try:

		cursor.execute(sql)
		db.commit()

	except:

		db.rollback()

	db.close()

	return render_template('pass.html')

@app.route('/peliculas', methods=['POST'])
def peliculas():

	nombre = request.form['nombre']
	actor = request.form['actor']
	director= request.form['director']
	estreno= request.form['estreno']
	calidad= request.form['calidad']
	ubicacion= request.form['ubicacion']
	tipo= request.form['tipo']


	db = pymysql.connect(host="",user="",password="",db="", port=)

	cursor = db.cursor()

	sql = "INSERT INTO Peliculas (nombre,actor,director,estreno,calidad,ubicacion,tipo) VALUES ('{0}','{1}','{2}','{3}','{4}','{5}','{6}')".format(nombre,actor,director,estreno,calidad,ubicacion,tipo)

	print(sql)

	try:

		cursor.execute(sql)
		db.commit()

	except:

		db.rollback()

	db.close()

	return render_template('pass.html')



if __name__ == '__main__':
  app.run(host="0.0.0.0",port=8080)
