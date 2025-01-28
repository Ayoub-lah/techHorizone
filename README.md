<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


# Tech Horizons - Online Magazine Management System

**Tech Horizons** is a web application developed in PHP/MySQL to manage an online magazine that explores the latest technological innovations. The application allows users to subscribe to themes, browse articles, recommend content, and interact with the magazine's content. It also provides an intuitive and secure interface for different types of users, including guests, subscribers, theme managers, and editors.

---

## Table of Contents

- [About the Project](#about-the-project)
- [Features](#features)
- [User Roles](#user-roles)
- [Technologies Used](#technologies-used)
- [Setup](#setup)
- [Database Design](#database-design)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## About the Project

Tech Horizons is an online magazine that focuses on cutting-edge technologies such as Artificial Intelligence, Internet of Things, Cybersecurity, Virtual and Augmented Reality, and more. The platform aims to provide a space for tech enthusiasts, professionals, and curious minds to explore, share, and discuss technological advancements and their societal impacts.

The web application allows users to:
- Subscribe to specific themes.
- Browse articles based on their interests.
- Recommend articles for publication.
- Manage their reading history and preferences.
- Interact with articles through ratings and chat conversations.

---

## Features

### For Guests:
- View information about available themes.
- Submit a subscription request to the magazine.
- Browse public issues of the magazine.

### For Subscribers:
- Access a personalized space to view all magazine issues.
- Manage theme subscriptions.
- Track and filter browsing history to revisit previously read articles.
- Recommend articles for publication and track their status (Refused, In Progress, Accepted, Published).
- Rate articles (1 to 5 stars) and participate in article-related chat conversations.

### For Theme Managers:
- Manage subscriptions and articles related to their assigned theme.
- Review articles submitted by subscribers and propose them for publication.
- Moderate chat conversations related to their theme's articles.
- View statistics on articles and subscribers for their theme.

### For Editors:
- Manage magazine issues (publish, make public, etc.).
- Add, modify, block, or delete subscribers and theme managers.
- Activate or deactivate published issues or articles.
- View detailed statistics on subscribers, theme managers, issues, themes, and articles.

---

## User Roles

1. **Guest**: Can view theme information, submit subscription requests, and browse public issues.
2. **Subscriber**: Can manage subscriptions, browse articles, recommend content, and interact with articles.
3. **Theme Manager**: Manages a specific theme, reviews articles, and moderates discussions.
4. **Editor**: Oversees the entire magazine, manages issues, and has full administrative control.

---

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP , laravel , phpmyadmin
- **Database**: MySQL
- **Additional Tools**: Bootstrap (for responsive design), jQuery (for interactive elements)

---

## Setup

To set up the project locally, follow these steps:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-username/tech-horizons.git

## Set Up the Database

1. **Import the provided SQL file** (`test.sql`) into your MySQL database.
2. **Update the database connection settings** in `config.php`.

## Configure the Server

1. Place the project folder in your web server's root directory (e.g., `htdocs` for XAMPP or `www` for WAMP).
2. Start your local server (Apache, MySQL).

## Access the Application

- Open your browser and navigate to `http://localhost/tech-horizons`.

---

## Database Design

The database consists of the following tables:

- **Users**: Stores user information (guests, subscribers, theme managers, editors).
- **Themes**: Contains the list of available themes (AI, IoT, Cybersecurity, etc.).
- **Articles**: Stores articles with details like title, content, theme, status, etc.
- **Subscriptions**: Manages user subscriptions to themes.
- **Recommendations**: Tracks articles recommended by subscribers.
- **Ratings**: Stores user ratings for articles.
- **Chats**: Manages conversations related to articles.
- **Issues**: Tracks magazine issues and their publication status.

---

## Usage

- **Guests**: Can browse the magazine and submit subscription requests.
- **Subscribers**: Can log in to access personalized content, recommend articles, and interact with the platform.
- **Theme Managers**: Can manage their assigned themes, review articles, and moderate discussions.
- **Editors**: Have full control over the magazine, including publishing issues and managing users.

---

## Contributing

Contributions are welcome! If you'd like to contribute to the project, please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Submit a pull request with a detailed description of your changes.

---

## License

This project is licensed under the **MIT License**. See the [LICENSE](LICENSE) file for more details.

---

## Contact

If you have any questions or suggestions, feel free to reach out:

- **Email**: lhlaibiayoub.com
- **LinkedIn**: [Ayoub lahlaibi](https://www.linkedin.com/in/ayoub-lahlaibi)
- **GitHub**: [Ayoub-lah](https://github.com/Ayoub-lah)
