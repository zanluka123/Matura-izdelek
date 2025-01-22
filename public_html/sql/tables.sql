CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(60) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_active TINYINT NOT NULL DEFAULT 1
);

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `created`, `is_active`) VALUES
(1, 'Matej', 'Mencin', 'matejmatik@outlook.com', '6bd870c2e3126ad8467fc45872c4e4bf', '2025-01-19 17:58:10', 1),
(2, 'Jani', 'Novak', 'janez.novak@gmail.com', '6bd870c2e3126ad8467fc45872c4e4bf', '2025-01-20 18:07:50', 1),
(3, 'Mari', 'Kovač', 'mari.kovac@yahoo.com', '6bd870c2e3126ad8467fc45872c4e4bf', '2025-01-22 18:08:21', 1);

CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    description TEXT,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_finished TINYINT NOT NULL DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO `tasks` (`id`, `user_id`, `description`, `created`, `is_finished`) VALUES
(1, 1, 'Popravi teste.', '2025-01-15 19:08:28', 0),
(2, 1, 'Kupi vinjeto', '2025-01-15 19:08:28', 0),
(3, 2, 'Pošlji voščilo', '2025-01-12 19:08:28', 0),
(4, 2, 'Rojstni dan: Mari Kovač.', '2025-01-17 19:08:28', 0),
(5, 3, 'Kino dan.', '2025-01-20 19:08:28', 0),
(6, 3, 'Napiši pismo za odvetnika.', '2025-01-25 19:08:28', 0),
(7, 1, 'Pojdi k zobozdravniku.', '2025-01-19 14:08:28', 0),
(8, 2, 'Popravi teste.', '2025-01-17 15:08:28', 0);