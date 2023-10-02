const express = require('express'); //se requiere express
const router = express.Router(); 
const User = require('../models/user');//se requiere el modelo de usuario definido en 'user.js'

// Obtener todos los usuarios
router.get('/', async (req, res) => {
  try {
    const users = await User.find(); 
    res.json(users);
  } catch (err) {
    res.status(500).json({ message: err.message });//envía una respuesta de error
  }
});

// Obtener un usuario por id
router.get('/:id', getUser, (req, res) => {
  res.json(res.user);  // Envía el usuario con el id en formato Json
});

// Crear un nuevo usuario
router.post('/', async (req, res) => {
  const user = new User({
    title: req.body.title,
    description: req.body.description
  }); 
  try {
    const newUser = await user.save();//guarda el usuario creado
    res.status(201).json(newUser);//muestra el usuario en formato Json
  } catch (err) {
    res.status(400).json({ message: err.message });//envia error en caso de ser necesario
  }
});

// Actualizar un usuario existente
router.patch('/:id', getUser, async (req, res) => {
  if (req.body.title != null) {
    res.user.title = req.body.title; //actualiza el titulo
  }
  if (req.body.description != null) {
    res.user.description = req.body.description;//actualiza la descripcion
  }
  try {
    const updatedUser = await res.user.save();//guarda los cambios en la base de datos
    res.json(updatedUser);//muestra el usuario actualizado en formato Json
  } catch (err) {
    res.status(400).json({ message: err.message });//envia error en caso de ser necesario
  }
});

// Eliminar un usuario
router.delete('/:id', getUser, async (req, res) => {
  try {
    await User.findByIdAndRemove(req.params.id);//busca y elimina un usuario por id.
    res.json({ message: 'Usuario eliminado' });//envía un mensaje de confirmacion
  } catch (err) {
    res.status(500).json({ message: err.message });//envia error en caso de ser necesario
  }
});

//función para obtener un usuario por id.
async function getUser(req, res, next) {
  let user;
  try {
    user = await User.findById(req.params.id);//busca un usuario por id.
    if (user == null) {
      return res.status(404).json({ message: 'No se encontro el usuario' });//responde al no encontrar un usuario
    }
  } catch (err) {
    return res.status(500).json({ message: err.message });//envia error en caso de ser necesario
  }

  res.user = user;
  next();
}

module.exports = router;
