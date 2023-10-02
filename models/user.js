const mongoose = require('mongoose')

const userSchema = new mongoose.Schema({
  title: {
    type: String,
    required: true
  },
  description: {
    type: String,
    required: true
  },
  createdUserDate: {
    type: Date,
    required: true,
    default: Date.now
  }
})

module.exports = mongoose.model('user', userSchema)