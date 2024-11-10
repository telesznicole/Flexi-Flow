// backend/routes/workouts.js

const express = require('express');
const Workout = require('../models/workout');
const router = express.Router();

// Get all workouts
router.get('/', async (req, res) => {
    try {
        const workouts = await Workout.find();
        res.json(workouts);
    } catch (err) {
        res.status(500).json({ message: err.message });
    }
});

// Add a new workout
router.post('/', async (req, res) => {
    const workout = new Workout(req.body);
    try {
        const savedWorkout = await workout.save();
        res.status(201).json(savedWorkout);
    } catch (err) {
        res.status(400).json({ message: err.message });
    }
});

module.exports = router;
