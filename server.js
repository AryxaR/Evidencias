const express = require('express'); //se llama al modulo de express
const app = express(); //se llama a la funcion express
const mongoose = require('mongoose'); //se llama la libreria de mongoose 

mongoose.connect('mongodb+srv://Arix:arix369@cluster0.ww72jht.mongodb.net/?retryWrites=true&w=majority', { useNewUrlParser: true }); //conexion a la base de datos
const db = mongoose.connection //se guarfa la conexion de la base de datos 
db.on('error', (error) => console.error(error)); //muestar error por consola
db.once('open', () => console.log('Connected to Database')); //se muestra si la conexion fue exitosa

app.use(express.json()); //se utilisa expres para convertir los formato Json

const usersRouter = require('./routes/users');// *agrega el archivo de users que contiene las rutas
app.use('/users', usersRouter); 

app.listen(3000, () => console.log('Server Started'))//se le asigna un puerto 

