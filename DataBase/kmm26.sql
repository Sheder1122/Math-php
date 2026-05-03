-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 03 2026 г., 13:19
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kmm26`
--

-- --------------------------------------------------------

--
-- Структура таблицы `definite_integral`
--

CREATE TABLE `definite_integral` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `func` varchar(255) NOT NULL,
  `a` double NOT NULL,
  `b` double NOT NULL,
  `user_answer` double NOT NULL,
  `correct_answer` double NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `definite_integral`
--

INSERT INTO `definite_integral` (`id`, `user_id`, `func`, `a`, `b`, `user_answer`, `correct_answer`, `res`) VALUES
(1, 2, 'x*x', 0, 1, 2, 0.33333333333333, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `det`
--

CREATE TABLE `det` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a11` double NOT NULL,
  `a12` double NOT NULL,
  `a13` double NOT NULL,
  `a21` double NOT NULL,
  `a22` double NOT NULL,
  `a23` double NOT NULL,
  `a31` double NOT NULL,
  `a32` double NOT NULL,
  `a33` double NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `det`
--

INSERT INTO `det` (`id`, `user_id`, `a11`, `a12`, `a13`, `a21`, `a22`, `a23`, `a31`, `a32`, `a33`, `res`) VALUES
(1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `double_integral`
--

CREATE TABLE `double_integral` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `func` varchar(255) NOT NULL,
  `ax` double NOT NULL COMMENT 'Нижний предел по x',
  `bx` double NOT NULL COMMENT 'Верхний предел по x',
  `ay` double NOT NULL COMMENT 'Нижний предел по y',
  `by` double NOT NULL COMMENT 'Верхний предел по y',
  `user_answer` double NOT NULL,
  `correct_answer` double NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `double_integral`
--

INSERT INTO `double_integral` (`id`, `user_id`, `func`, `ax`, `bx`, `ay`, `by`, `user_answer`, `correct_answer`, `res`) VALUES
(1, 1, 'x+y', 0, 1, 0, 1, 1, 1, 1),
(2, 5, 'x*y', 0, 2, 0, 3, 9, 9, 1),
(3, 1, 'sin(x)*cos(y)', 0, 1, 0, 1, 1, 0.38682227146901, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `exp`
--

CREATE TABLE `exp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `ex` int(11) NOT NULL,
  `ex_new` int(11) NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `exp`
--

INSERT INTO `exp` (`id`, `user_id`, `x`, `ex`, `ex_new`, `res`) VALUES
(1, 3, 0, 1, 0, 0),
(2, 2, 0, 5, 0, 0),
(3, 4, 0, 3, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `integral`
--

CREATE TABLE `integral` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `func` text DEFAULT NULL,
  `user_answer` text DEFAULT NULL,
  `res` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `integral`
--

INSERT INTO `integral` (`id`, `user_id`, `func`, `user_answer`, `res`) VALUES
(1, 3, 'func', 'answer', 0),
(2, 5, 'func', 'answer', 0),
(3, 5, 'func', 'answer', 1),
(4, 5, 'func', 'answer', 0),
(5, 5, 'func', 'answer', 1),
(6, 4, 'func', 'answer', 1),
(7, 4, 'func', 'answer', 0),
(8, 2, 'func', 'answer', 1),
(9, 4, 'func', 'answer', 0),
(10, 5, 'func', 'answer', 1),
(11, 4, 'func', 'answer', 1),
(12, 2, 'x^3', 'x*x', 0),
(13, 5, 'x^2', 'x*x*x/3', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `is_treug`
--

CREATE TABLE `is_treug` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `x1` float DEFAULT NULL,
  `y1` float DEFAULT NULL,
  `x2` float DEFAULT NULL,
  `y2` float DEFAULT NULL,
  `x3` float DEFAULT NULL,
  `y3` float DEFAULT NULL,
  `user_choice` int(11) DEFAULT NULL,
  `res` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `is_treug`
--

INSERT INTO `is_treug` (`id`, `user_id`, `x1`, `y1`, `x2`, `y2`, `x3`, `y3`, `user_choice`, `res`) VALUES
(1, 5, 1, 1, 2, 2, 3, 3, 1, 1),
(2, 3, 1, 1, 2, 2, 3, 3, 2, 0),
(3, 1, 1, 1, 1, 2, 1, 3, 4, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `kramer`
--

CREATE TABLE `kramer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a11` double NOT NULL,
  `a12` double NOT NULL,
  `a13` double NOT NULL,
  `a21` double NOT NULL,
  `a22` double NOT NULL,
  `a23` double NOT NULL,
  `a31` double NOT NULL,
  `a32` double NOT NULL,
  `a33` double NOT NULL,
  `b1` double NOT NULL,
  `b2` double NOT NULL,
  `b3` double NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `kramer`
--

INSERT INTO `kramer` (`id`, `user_id`, `a11`, `a12`, `a13`, `a21`, `a22`, `a23`, `a31`, `a32`, `a33`, `b1`, `b2`, `b3`, `res`) VALUES
(1, 3, 1, 1, 0, 0, 2, 2, 0, 0, 3, 1, 1, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `kv_ur`
--

CREATE TABLE `kv_ur` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `a` double NOT NULL,
  `b` double NOT NULL,
  `c` double NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `kv_ur`
--

INSERT INTO `kv_ur` (`id`, `user_id`, `a`, `b`, `c`, `res`) VALUES
(1, 4, 1, 2, 3, 0),
(2, 4, 1, 2, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `matrix_rank`
--

CREATE TABLE `matrix_rank` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a11` double NOT NULL,
  `a12` double NOT NULL,
  `a13` double NOT NULL,
  `a21` double NOT NULL,
  `a22` double NOT NULL,
  `a23` double NOT NULL,
  `a31` double NOT NULL,
  `a32` double NOT NULL,
  `a33` double NOT NULL,
  `user_rank` int(11) NOT NULL,
  `correct_rank` int(11) NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `matrix_rank`
--

INSERT INTO `matrix_rank` (`id`, `user_id`, `a11`, `a12`, `a13`, `a21`, `a22`, `a23`, `a31`, `a32`, `a33`, `user_rank`, `correct_rank`, `res`) VALUES
(1, 3, 1, 0, 0, 0, 1, 0, 0, 0, 1, 3, 3, 1),
(2, 3, 1, 0, 0, 0, 1, 0, 0, 0, 1, 3, 3, 1),
(3, 3, 1, 0, 0, 0, 1, 0, 0, 0, 1, 3, 3, 1),
(4, 3, 1, 0, 0, 0, 1, 0, 0, 0, 1, 3, 3, 1),
(5, 2, 1, 0, 0, 0, 1, 0, 0, 0, 1, 3, 3, 1),
(6, 2, 1, 1, 0, 0, 1, 1, 0, 0, 0, 2, 2, 1),
(7, 5, 2, 0, 0, 0, 2, 0, 0, 0, 2, 2, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `matrix_sum`
--

CREATE TABLE `matrix_sum` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `matrix_sum`
--

INSERT INTO `matrix_sum` (`id`, `user_id`, `res`) VALUES
(1, 3, 1),
(2, 3, 1),
(3, 2, 0),
(4, 3, 0),
(5, 3, 0),
(6, 4, 0),
(7, 4, 1),
(8, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `sin`
--

CREATE TABLE `sin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sin` float NOT NULL,
  `new_sin` decimal(10,0) NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `sin`
--

INSERT INTO `sin` (`id`, `user_id`, `sin`, `new_sin`, `res`) VALUES
(1, 4, 0, 1, 0),
(2, 2, 4, 0, 0),
(3, 1, 0.84147, 0, 0),
(4, 5, 3, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `treug`
--

CREATE TABLE `treug` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a` float NOT NULL,
  `b` float NOT NULL,
  `c` float NOT NULL,
  `angle1` float NOT NULL,
  `angle2` float NOT NULL,
  `angle3` float NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `treug`
--

INSERT INTO `treug` (`id`, `user_id`, `a`, `b`, `c`, `angle1`, `angle2`, `angle3`, `res`) VALUES
(1, 3, 3, 3, 3, 60, 60, 60, 0),
(2, 3, 3, 3, 3, 60, 60, 60, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `treug_mbh`
--

CREATE TABLE `treug_mbh` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a` double NOT NULL,
  `b` double NOT NULL,
  `c` double NOT NULL,
  `ha` double NOT NULL,
  `hb` double NOT NULL,
  `hc` double NOT NULL,
  `ma` double NOT NULL,
  `mb` double NOT NULL,
  `mc` double NOT NULL,
  `ba` double NOT NULL,
  `bb` double NOT NULL,
  `bc` double NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `treug_mbh`
--

INSERT INTO `treug_mbh` (`id`, `user_id`, `a`, `b`, `c`, `ha`, `hb`, `hc`, `ma`, `mb`, `mc`, `ba`, `bb`, `bc`, `res`) VALUES
(1, 5, 5, 5, 5, 3, 3, 3, 2, 3, 4, 5, 6, 7, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `treug_square`
--

CREATE TABLE `treug_square` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a` double NOT NULL,
  `b` double NOT NULL,
  `c` double NOT NULL,
  `ha` double NOT NULL,
  `hb` double NOT NULL,
  `hc` double NOT NULL,
  `s` double NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `treug_square`
--

INSERT INTO `treug_square` (`id`, `user_id`, `a`, `b`, `c`, `ha`, `hb`, `hc`, `s`, `res`) VALUES
(1, 2, 3, 3, 3, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `surname`, `name`) VALUES
(1, 'Пуговкин', 'Дмитрий'),
(2, 'Германов', 'Фёдор'),
(4, 'Остроухов', 'Иван'),
(3, 'Пушкин', 'Пётр'),
(5, 'Иконов', 'Буня');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `definite_integral`
--
ALTER TABLE `definite_integral`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `det`
--
ALTER TABLE `det`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `double_integral`
--
ALTER TABLE `double_integral`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `exp`
--
ALTER TABLE `exp`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `integral`
--
ALTER TABLE `integral`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `is_treug`
--
ALTER TABLE `is_treug`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kramer`
--
ALTER TABLE `kramer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kv_ur`
--
ALTER TABLE `kv_ur`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `matrix_rank`
--
ALTER TABLE `matrix_rank`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `matrix_sum`
--
ALTER TABLE `matrix_sum`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sin`
--
ALTER TABLE `sin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `treug`
--
ALTER TABLE `treug`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `treug_mbh`
--
ALTER TABLE `treug_mbh`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `treug_square`
--
ALTER TABLE `treug_square`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `definite_integral`
--
ALTER TABLE `definite_integral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `det`
--
ALTER TABLE `det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `double_integral`
--
ALTER TABLE `double_integral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `exp`
--
ALTER TABLE `exp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `integral`
--
ALTER TABLE `integral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `is_treug`
--
ALTER TABLE `is_treug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `kramer`
--
ALTER TABLE `kramer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `kv_ur`
--
ALTER TABLE `kv_ur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `matrix_rank`
--
ALTER TABLE `matrix_rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `matrix_sum`
--
ALTER TABLE `matrix_sum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `sin`
--
ALTER TABLE `sin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `treug`
--
ALTER TABLE `treug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `treug_mbh`
--
ALTER TABLE `treug_mbh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `treug_square`
--
ALTER TABLE `treug_square`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
