const express = require('express');
const Run = require('../models/Run');
const router = express.Router();

// 获取所有记录
router.get('/runs', async (req, res) => {
    const runs = await Run.find();
    res.json(runs);
});

// 创建新记录
router.post('/runs', async (req, res) => {
    const newRun = new Run(req.body);
    await newRun.save();
    res.json(newRun);
});

module.exports = router;
