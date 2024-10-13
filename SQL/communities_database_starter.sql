-- SQL Dump Generated from CSV
START TRANSACTION;

CREATE TABLE `communities` (
  `id` INT NOT NULL,
  `name` TEXT NOT NULL,
  `picture` TEXT NOT NULL
  , PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Inserting data from CSV
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('1', 'Weightlifting for Beginners', 'pictures/dumbell-5237134_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('2', 'Gym Workout Tips', 'pictures/dumbbells-2465478_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('3', 'Cardio Training Group', 'pictures/running-7056590_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('4', 'Strength Training Tips', 'pictures/fitness-1038434_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('5', 'Running for Fitness', 'pictures/running-4782722_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('6', 'Yoga for Flexibility', 'pictures/yoga-3677898_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('7', 'Powerlifting Discussions', 'pictures/weights-79587_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('8', 'Gym Equipment Advice', 'pictures/fitness-4999754_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('9', 'Strength & Mobility', 'pictures/weight-8246973_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('10', 'Wellness & Recovery', 'pictures/exercise-1284374_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('11', 'CrossFit Beginners', 'pictures/crossfit-3712058_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('12', 'HIIT Training Community', 'pictures/workout-5914643_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('13', 'Pilates for Beginners', 'pictures/fitness-1948813_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('14', 'Home Gym Setup', 'pictures/home-fitness-equipment-1840858_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('15', 'Fitness Newcomers Forum', 'pictures/dumbbells-932426_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('16', 'Circuit Training Tips', 'pictures/kettle-bell-592905_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('17', 'Nutrition for Workouts', 'pictures/berries-3504149_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('18', 'Workout Routine Sharing', 'pictures/gym-5022285_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('19', 'Active Lifestyle Tips', 'pictures/man-1838991_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('20', 'Strength Training Help', 'pictures/muscles-811479_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('21', 'Conditioning for Athletes', 'pictures/dumbbells-5940729_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('22', 'Bodyweight Strength Group', 'pictures/adult-5009657_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('23', 'Flexibility Training Group', 'pictures/yoga-3053488_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('24', 'Marathon Training Tips', 'pictures/running-6660186_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('25', 'Beginner Strength Goals', 'pictures/fitness-1677212_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('26', 'Fitness Accountability Forum', 'pictures/man-5886574_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('27', 'Weight Loss Strategies', 'pictures/tape-403593_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('28', 'Nutrition & Meal Prep', 'pictures/vegetable-755723_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('29', 'Gym Partner Finder', 'pictures/workout-6783020_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('30', 'Muscle Building Tips', 'pictures/dumbbell-1966247_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('31', 'Functional Strength Forum', 'pictures/workout-2523087_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('32', 'Core Strength Tips', 'pictures/ab-workout-7445555_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('33', 'Powerlifting Community', 'pictures/sport-2792995_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('34', 'Daily Workout Challenges', 'pictures/sports-7392271_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('35', 'Endurance Building Tips', 'pictures/people-2590524_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('36', 'HIIT Workout Challenges', 'pictures/people-2604151_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('37', 'Fitness Plan Discussion', 'pictures/casio-8392121_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('38', 'Strength Progress Group', 'pictures/adult-1850925_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('39', 'Calisthenics Workouts', 'pictures/street-workout-2628919_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('40', 'Personal Best Challenges', 'pictures/woman-6777444_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('41', 'Fitness Inspiration Forum', 'pictures/rock-1573068_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('42', 'Workout Routine Tips', 'pictures/workout-5914641_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('43', 'New to Strength Training', 'pictures/weights-8246972_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('44', 'Weekly Fitness Challenges', 'pictures/fitness-4047616_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('45', 'Cardio Endurance Forum', 'pictures/personal-trainers-denver-8839254_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('46', 'Health & Wellness Guide', 'pictures/vegetables-3541910_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('47', 'Strength Progress Tracker', 'pictures/sport-1235019_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('48', 'Running Techniques Forum', 'pictures/track-19217_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('49', 'Total Body Strength Group', 'pictures/gym-2649824_1280.jpg');
INSERT INTO `communities` (`id`, `name`, `picture`) VALUES ('50', 'Fitness Transformation', 'pictures/man-461195_1280.jpg');

-- Setting AUTO_INCREMENT to continue from max id + 1
ALTER TABLE `communities` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

COMMIT;
