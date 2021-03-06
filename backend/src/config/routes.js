const express = require('express')

module.exports = function(server) {

    // API Routes
    const router = express.Router()
    server.use('/api', router)

    // TODO Routes
    const bdService = require('../api/db/bdService')
    bdService.register(router, '/bds')
}