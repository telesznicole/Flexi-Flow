// backend/models/workout.js

const mongoose = require('mongoose');

const workoutSchema = new mongoose.Schema({
    title: { type: String, required: true },
    duration: { type: String, required: true },
    calories: { type: Number, required: true },
    description: { type: String, required: true }
});

module.exports = mongoose.model('Workout', workoutSchema);
