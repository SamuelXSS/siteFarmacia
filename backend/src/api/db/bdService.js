const Service = require('./bd')

Service.methods(['get', 'post', 'put', 'delete'])
Service.updateOptions({new: true, runValidators: true})

module.exports = Service