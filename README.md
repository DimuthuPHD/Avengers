# Expressway Transport (Pvt) Ltd - Laravel Project

## Author

This Laravel project for Expressway Transport (Pvt) Ltd is authored by Dimuthu.

For inquiries or collaborations, you can reach out via email at phdimuthukumara@gmail.com.

Feel free to contribute and make this project even better! 🌟


Welcome to the Expressway Transport Laravel Project! This project is designed to revolutionize the management of bus operations, routes, and schedules for Expressway Transport (Pvt) Ltd.

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [Test Users](#test-users)
- [Contributing](#contributing)
- [License](#license)

## Introduction

Expressway Transport (Pvt) Ltd is a transport company handling the operations of 100 buses, daily trips, and bus routes. This Laravel project aims to streamline and modernize the management of bus-related activities, providing a robust solution to overcome manual record-keeping challenges.

## Features

- **Bus Management:** Efficiently manage details related to the fleet of buses.
- **Route Management:** Seamlessly handle and organize bus routes for optimal efficiency.
- **Scheduling:** Plan and schedule bus trips with ease.
- **User Authentication:** Differentiate roles and provide secure access to various features.
- **Data Security:** Implement measures to handle GDPR and ensure the security of personal information.
- **Future Innovations:** Set the groundwork for future innovations and enhancements.

## Getting Started

### Prerequisites

Before you begin, ensure you have the following installed:

- PHP
- Composer
- Laravel CLI
- MySQL Database

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/yourusername/expressway-transport-laravel.git
    ```

2. Navigate to the project directory:

    ```bash
    cd expressway-transport-laravel
    ```

3. Install dependencies:

    ```bash
    composer install
    ```

4. Copy `.env.example` to `.env` and configure your database settings:

    ```bash
    cp .env.example .env
    ```

5. Generate application key:

    ```bash
    php artisan key:generate
    ```

6. Run database migrations:

    ```bash
    php artisan migrate
    ```
7. Seed the database:

    ```bash
    php artisan db:seed
    ```

8. Start the development server:

    ```bash
    php artisan serve
    ```

Now, you're ready to explore the Expressway Transport (Pvt) Ltd Laravel project!

## Usage

Provide instructions and examples on how to use and navigate through the system. Include any additional setup steps or configurations that users might need.

## Test Users

For testing purposes, the system comes with predefined test users with different roles:

### Super Admin

- **Username:** Super Admin
- **Email:** admin@example.com
- **Password:** secret

### Editor

- **Username:** IT Admin
- **Email:** editor@example.com
- **Password:** secret

### Manager

- **Username:** Manager
- **Email:** manager@example.com
- **Password:** secret

## Contributing

We welcome contributions from the community! If you have ideas, bug reports, or feature requests, feel free to open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).

Happy coding! 🚀
