const mongoose = require('mongoose');

const RunSchema = new mongoose.Schema({
    timeLogged: String,
    distance: String,
    duration: String,
    pace: String,
    elevationGain: String,
    heartRate: {
        resting: Number,
        high: Number
    },
    calories: Number
});

module.exports = mongoose.model('Run', RunSchema);
