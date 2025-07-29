<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}



define('BASE_PATH', __DIR__);
define('DATA_PATH', BASE_PATH . '/data');


if (!file_exists(DATA_PATH)) {
    mkdir(DATA_PATH, 0755, true);
}


$data_files = [
    'users.json' => [],
    'courses.json' => [
        [
            'id' => 1,
            'title' => 'Introduction to HTML',
            'description' => 'Learn the foundation of web development with HTML (HyperText Markup Language)! This beginner-friendly course will teach you how to structure web pages using proper semantic HTML, create forms, embed media, and prepare your content for styling with CSS.
By the end of this course, you will:
✅ Understand HTML document structure
✅ Use semantic HTML5 tags correctly
✅ Build forms with validation
✅ Embed images, videos, and iframes
✅ Create accessible web content
✅ Publish your first live website',
            'instructor' => 'John Doe',
            'category' => 'Web Development',
            'image' => 'image/html.webp',
        ],
        [
            'id' => 2,
            'title' => 'CSS Fundamentals',
            'description' => 'Unlock the power of CSS to create stunning, responsive websites! This hands-on course will teach you how to style web pages beautifully, from basic selectors to advanced Flexbox and Grid layouts.

By the end of this course, you will:
✅ Write clean and efficient CSS code
✅ Master layout techniques (Flexbox & Grid)
✅ Create fully responsive designs
✅ Implement animations and transitions
✅ Follow best practices for maintainable CSS
✅ Build real-world projects (portfolio, landing page)',
            'instructor' => 'Jane Smith',
            'category' => 'Web Development',
            'image' => 'image/css.png',
        ],
        [
            'id' => 3,
            'title' => 'Javascript Fundamentals',
            'description' => 'Master the power of JavaScript, the most essential programming language for web development! This beginner-friendly course will take you from the basics of JavaScript to building interactive and dynamic web applications.

By the end of this course, you will:
✅ Understand core JavaScript concepts like variables, functions, loops, and objects.
✅ Manipulate the DOM to create dynamic web pages.
✅ Work with APIs to fetch and display real-world data.
✅ Build mini-projects like a to-do app, weather app, and a simple game.
✅ Learn modern ES6+ features (arrow functions, destructuring, async/await).
✅ Debug and optimize your JavaScript code like a pro.',
            'instructor' => 'Kyle James',
            'category' => 'Web Development',
            'image' => 'image/javascript.jpg'
        ],
        [
            'id' => 4,
            'title' => 'PHP Fundamentals',
            'description' => 'Master PHP to power up your websites! Go from beginner to confident back-end developer as you learn to create database-driven web applications with PHP. This hands-on course covers everything from basic syntax to building a complete content management system.
you will learn about how:
✔ Process forms and handle user input securely
✔ Work with MySQL databases (CRUD operations)
✔ Build authentication systems (login/registration)
✔ Create reusable code with functions and classes
✔ Develop RESTful APIs for modern web apps
✔ Protect against common security vulnerabilities.',
            'instructor' => 'Alex Patterson',
            'category' => 'Web Development',
            'image' => 'image/php.jpg'
        ],
        [
            'id' => 5,
            'title' => 'SQL Database',
            'description' => 'Master SQL to control data like a pro!" Dive into database management and learn to extract powerful insights using the universal language of data. From basic queries to advanced analytics, this hands-on course will make you fluent in SQL for any development or data analysis role.
            you will learn about how : ✔ Write efficient SELECT queries with filtering/sorting
                                       ✔ Master JOINs to combine data from multiple tables
                                       ✔ Design optimized database schemas
                                       ✔ Create views, stored procedures, and triggers
                                       ✔ Optimize query performance with indexing
                                       ✔ Implement proper database security',
            'instructor' => 'John Miller',
            'category' => 'Database',
            'image' => 'image/sql.avif'
        ],
        [
            'id' => 6,
            'title' => 'Python',
            'description' => 'Dive into the most versatile programming language! From writing your first line of code to building functional applications, this hands-on course will transform you into a confident Python developer. Whether you want to automate tasks, analyze data, or create web apps, you will gain the skills to turn ideas into reality.
            you will learn about how : ✔ Versatile Coding: Automate tasks, analyze data, and build web apps
                                       ✔ Real Projects: Web scraper, weather app, chatbot, and data visualizations
                                       ✔ Libraries: Django, Flask, Pandas, NumPy
                                       ✔ Beginner-Friendly: Start from zero, learn by doing
                                       ✔ Career Paths: Web dev, data science, automation, and machine learning',
            'instructor' => 'James Walker',
            'category' => 'Programming',
            'image' => 'image/python.png'
        ],
        [
            'id' => 7,
            'title' => 'Java',
            'description' => 'Dive into the powerhouse of enterprise development! This course covers Java fundamentals, OOP principles, and real-world applications. Build scalable, secure, and robust software to thrive in backend, mobile, and enterprise environments.
You will learn about how:
✔ Core Java: Syntax, control flow, and exception handling
✔ OOP: Classes, interfaces, inheritance, and polymorphism
✔ Advanced Topics: Multithreading, collections, and Java Streams
✔ Frameworks: Introduction to Spring and Hibernate
✔ Career Paths: Enterprise dev, Android apps, backend services',
            'instructor' => 'Thomas Kidd',
            'category' => 'Programming',
            'image' => 'image/java.jpg'
        ],
        [
            'id' => 8,
            'title' => 'C/C++',
            'description' => 'Dive into the powerful world of C and C++, the backbone of high-performance programming! This hands-on course will guide you through system-level programming, memory management, and advanced object-oriented concepts. Whether you want to build game engines, embedded systems, or real-time apps, you will gain the skills to create fast, efficient software.
You will learn about how:
✔ Memory Management: Pointers, dynamic allocation, and smart pointers
✔ System-Level Programming: File I/O, concurrency, and hardware interfacing
✔ OOP Concepts: Classes, inheritance, polymorphism, and templates
✔ Performance Optimization: Efficient algorithms and data structures
✔ Career Paths: Systems programming, embedded software, game dev',
            'instructor' => 'Kevin Mikes',
            'category' => 'Programming',
            'image' => 'image/c&cpp.jpg'
        ],
        [
            'id' => 9,
            'title' => 'Networking',
            'description' => 'Unlock the secrets of how devices communicate and data flows across the globe! This comprehensive course covers fundamental networking concepts, protocols, and security practices that form the backbone of the internet and modern communications. Whether you want to manage networks, troubleshoot issues, or design secure systems, this course will equip you with essential skills for today’s connected world.
You will learn about how:
✔ Network Fundamentals: OSI & TCP/IP models, IP addressing, and subnetting
✔ Protocols & Services: DNS, DHCP, HTTP/S, FTP, and email protocols
✔ Routing & Switching: Configuration, VLANs, and traffic management
✔ Network Security: Firewalls, VPNs, encryption, and threat mitigation
✔ Troubleshooting: Tools, techniques, and best practices
✔ Career Paths: Network administration, cybersecurity, system engineering',
            'instructor' => 'Luke Jordan',
            'category' => 'IT & Infrastructure',
            'image' => 'image/networking.jpg'
        ],
        [
            'id' => 10,
            'title' => 'Git & Github',
            'description' => 'Gain total control over your code and streamline collaboration with the industry’s most essential tools. This hands-on course will teach you how to track changes, manage versions, and work with teams efficiently using Git and GitHub. Whether you are working solo or with others, you will learn how to keep your code organized, clean, and conflict-free.
You will learn about how:
✔ Version Control: Track, manage, and roll back changes in your code
✔ Repositories: Create, clone, commit, push, pull, and branch with ease
✔ Collaboration: Master pull requests, forks, merges, and resolving conflicts
✔ GitHub Features: Issues, wikis, Actions (CI/CD), and project boards
✔ Best Practices: Commit hygiene, branching models, and team workflows
✔ Career Paths: Software development, DevOps, open-source contributor

',
            'instructor' => 'Lara Bernard',
            'category' => 'Software Tools',
            'image' => 'image/git.png'
        ],
        [
            'id' => 11,
            'title' => 'Data Structure and Algorithm',
            'description' => 'Learn the logic that powers every smart program! This course teaches how to structure, organize, and process data efficiently using key algorithms and data structures. Mastering this will help you ace coding interviews and build faster, more scalable software.
You will learn about how:
✔ Core Structures: Arrays, linked lists, stacks, queues, trees, and graphs
✔ Essential Algorithms: Searching, sorting, recursion, and dynamic programming
✔ Time & Space Complexity: Analyze and optimize your code
✔ Problem Solving: Hands-on practice with real-world coding challenges
✔ Interview Prep: Sharpen skills for top tech company interviews
✔ Career Paths: Software engineer, competitive programmer, backend dev',
            'instructor' => 'Mohammad Suleiman',
            'category' => 'Programming',
            'image' => 'image/dsa.png'
        ],
        [
            'id' => 12,
            'title' => 'Mobile App Development',
            'description' => 'Build stunning mobile apps from scratch! This course teaches you to create responsive, high-performance applications for Android and iOS using modern frameworks. Bring your app ideas to life and reach users on the go.
You will learn about how:
✔ UI/UX Design: Create clean, user-friendly mobile interfaces
✔ Cross-Platform Development: Use Flutter, React Native, or native SDKs
✔ APIs & Databases: Integrate real-time data and cloud services
✔ App Deployment: Publish to Google Play and App Store
✔ Performance Optimization: Ensure smooth, efficient mobile experiences
✔ Career Paths: Mobile developer, app designer, startup founder',
            'instructor' => 'Sarah Lewis',
            'category' => 'App Development',
            'image' => 'image/app.avif'
        ],
        [
            'id' => 13,
            'title' => 'Machine Learning',
            'description' => 'Step into the world of intelligent systems! This course introduces you to the core concepts of machine learning and its real-world applications. From predictive modeling to neural networks, you will learn how to train machines to recognize patterns, make decisions, and solve complex problems with data.
You will learn about how:
✔ ML Foundations: Supervised, unsupervised, and reinforcement learning
✔ Model Building: Data preprocessing, training, testing, and evaluation
✔ Algorithms: Decision trees, linear regression, SVMs, and k-means
✔ Libraries: Scikit-learn, TensorFlow, Keras, Pandas
✔ Real Projects: Spam detection, stock prediction, image classification
✔ Career Paths: Data scientist, ML engineer, AI researcher',
            'instructor' => 'Ryan Hachem',
            'category' => 'AI & Data Science',
            'image' => 'image/machine_learning.jpg'
        ],
        [
            'id' => 14,
            'title' => 'DevOps',
            'description' => 'Break the wall between development and operations! This course equips you with the tools and practices to automate workflows, deploy applications smoothly, and maintain infrastructure with confidence. Become a DevOps practitioner who ships fast and reliably.
You will learn about how:
✔ CI/CD Pipelines: Automate testing, integration, and delivery
✔ Infrastructure as Code: Use tools like Terraform and Ansible
✔ Containerization: Work with Docker and Kubernetes
✔ Monitoring & Logging: Track performance using Prometheus, Grafana
✔ DevOps Culture: Agile, collaboration, feedback loops
✔ Career Paths: DevOps engineer, site reliability engineer, cloud ops',
            'instructor' => 'Mark Khoury',
            'category' => 'IT & Infrastructure',
            'image' => 'image/devops.jpg'
        ],
        [
            'id' => 15,
            'title' => 'Cloud Computing',
            'description' => 'Discover the backbone of modern software deployment. This course will guide you through the core concepts of cloud platforms and services, from virtualization and storage to containers and serverless computing.
You will learn about how:
✔ Cloud Models: IaaS, PaaS, SaaS explained
✔ Popular Platforms: AWS, Azure, Google Cloud fundamentals
✔ Deployment: Hosting apps, virtual machines, containers
✔ Storage & Networking: Scalable file systems and global distribution
✔ Career Paths: Cloud engineer, DevOps, backend infrastructure',
            'instructor' => 'Abbas Ismail',
            'category' => 'IT & Infrastructure',
            'image' => 'image/cloud.webp'
        ],
        [
            'id' => 16,
            'title' => 'CyberSecurity',
            'description' => 'Dive into the world of digital defense and ethical hacking! This course teaches you how to protect systems, networks, and data from cyberattacks. From securing devices to preventing breaches, you’ll gain practical skills to become a cybersecurity pro.
You will learn about how:
✔ Threat Types: Malware, phishing, DDoS, and more
✔ Security Layers: Firewalls, antivirus, VPNs, and encryption
✔ Ethical Hacking: Penetration testing and vulnerability scanning
✔ Best Practices: Password hygiene, access control, and risk management
✔ Career Paths: Cybersecurity analyst, penetration tester, SOC analyst',
            'instructor' => 'Kareem Said',
            'category' => 'IT & Security',
            'image' => 'image/cyber.png'
        ],
        [
            'id' => 17,
            'title' => 'Data Analytics',
            'description' => 'Dive into the world of data-driven decision-making and insights! This course teaches you how to collect, analyze, and interpret data to uncover trends and support smarter business choices. From data cleaning to visualization, you’ll gain practical skills to become a data analytics expert.
You will learn about how:
✔ Data Types & Sources: Structured, unstructured, big data, and databases
✔ Data Processing: Cleaning, transforming, and preparing datasets
✔ Analytical Techniques: Descriptive, predictive, and prescriptive analytics
✔ Tools & Visualization: Excel, SQL, Python, Tableau, and Power BI
✔ Best Practices: Data ethics, storytelling, and effective communication
✔ Career Paths: Data analyst, business analyst, data scientist',
            'instructor' => 'Albert Jones',
            'category' => 'Data Science & Analytics',
            'image' => 'image/dataanalytics.jpg'
        ],
        [
            'id' => 18,
            'title' => 'Artificial Intelligence',
            'description' => 'This course teaches you how to build systems that can learn, reason, and make decisions. From the foundations of machine learning to neural networks and intelligent agents, you’ll gain hands-on experience to launch your AI journey.
You will learn about how:
✔ AI Fundamentals: Agents, environments, search algorithms, and decision-making
✔ Machine Learning: Supervised, unsupervised, and reinforcement learning
✔ Neural Networks: Deep learning basics, feedforward, and convolutional models
✔ AI Tools & Frameworks: Python, TensorFlow, scikit-learn, and Keras
✔ Ethical AI: Bias, fairness, transparency, and responsible AI development
✔ Career Paths: AI engineer, machine learning developer, research scientist',
            'instructor' => 'Sophia Reed',
            'category' => 'AI & Machine Learning',
            'image' => 'image/ai.webp'
        ],
        [
            'id' => 19,
            'title' => 'Game Development',
            'description' => 'Create immersive games using code, creativity, and design!
This course guides you through the exciting process of game creation—from building mechanics and levels to designing player interactions. Whether you’re into 2D or 3D, you’ll gain the skills to build your own playable games.
You will learn about how:
✔ Game Engines: Unity (C#) or Unreal Engine (C++)
✔ Game Mechanics: Physics, collision, input handling
✔ Asset Management: Sprites, animations, sound, and UI
✔ Scripting: Logic, AI behavior, and event systems
✔ Publishing: Exporting for PC, mobile, or web
✔ Career Paths: Game developer, level designer, technical artist',
            'instructor' => 'Maya Carter',
            'category' => 'Game Design & Development',
            'image' => 'image/gamedev.jpg'
        ],
        [
            'id' => 20,
            'title' => 'Full Stack Development',
            'description' => 'This course covers everything you need to become a versatile developer. From crafting beautiful user interfaces to managing databases and APIs, you’ll learn to build and deploy full-stack web applications from scratch.
You will learn about how:
✔ Frontend Skills: HTML, CSS, JavaScript, React or Vue
✔ Backend Development: Node.js, Express, Django, or PHP
✔ Databases: MySQL, MongoDB, and data modeling
✔ Version Control: Git, GitHub, and collaboration workflows
✔ Deployment: Hosting, CI/CD, and production-ready apps
✔ Career Paths: Full stack developer, frontend/backend engineer, software developer',
            'instructor' => 'David Kim',
            'category' => 'Web Development',
            'image' => 'image/fullstack.webp'
        ],
        [
            'id' => 21,
            'title' => 'Software Engineering',
            'description' => 'This course teaches you the principles of software development—from planning and design to testing and deployment. You will learn how to write clean, scalable code and manage real-world software projects.
You will learn about how:
✔ Software Development Life Cycle (SDLC): Agile, Scrum, Waterfall
✔ Object-Oriented Programming: Classes, inheritance, encapsulation
✔ Design Principles: SOLID, MVC, architectural patterns
✔ Testing & Debugging: Unit tests, integration, and code reviews
✔ Project Management: Version control, documentation, and team workflows
✔ Career Paths: Software engineer, backend developer, systems architect',
            'instructor' => 'Noah Brooks',
            'category' => 'Software Development',
            'image' => 'image/SWE.jpg'
        ],
        [
            'id' => 22,
            'title' => 'Data Science',
            'description' => 'This course teaches you to extract knowledge from data using statistical analysis, machine learning, and visualization. You will learn how to work with real datasets and communicate your findings effectively.
You will learn about how:
✔ Data Wrangling: Cleaning, transforming, and preparing data
✔ Statistical Analysis: Hypothesis testing, distributions, regressions
✔ Machine Learning: Predictive modeling and clustering
✔ Tools & Languages: Python, Pandas, NumPy, Matplotlib, Jupyter
✔ Visualization: Dashboards, storytelling, and decision support
✔ Career Paths: Data scientist, data analyst, ML engineer',
            'instructor' => 'Liam Patel',
            'category' => 'Data Science & Analytics',
            'image' => 'image/data_science.jpg'
        ],
        [
            'id' => 23,
            'title' => 'Natural Language Processing',
            'description' => 'This course explores how computers interpret, analyze, and produce natural language. From chatbots to language translation, you will dive deep into the world of computational linguistics and AI-powered communication.
You will learn about how:
✔ Text Processing: Tokenization, stemming, lemmatization
✔ Language Modeling: N-grams, embeddings, transformers
✔ NLP Tasks: Sentiment analysis, classification, summarization
✔ Libraries: NLTK, spaCy, Hugging Face Transformers
✔ Applications: Chatbots, translation, question answering
✔ Career Paths: NLP engineer, AI researcher, language technologist',
            'instructor' => 'Emma Lin',
            'category' => 'AI & Machine Learning',
            'image' => 'image/nlp.jpg'
        ],
        [
            'id' => 24,
            'title' => 'Blockchain Development',
            'description' => 'This course teaches you how blockchain works, why it matters, and how to build secure, transparent systems without middlemen. From cryptocurrency basics to smart contracts, you’ll gain hands-on skills to thrive in the world of Web3.
You will learn about how:
✔ Blockchain Basics: Blocks, chains, nodes, and consensus mechanisms
✔ Cryptocurrency: Bitcoin, Ethereum, wallets, and transactions
✔ Smart Contracts: Writing and deploying contracts with Solidity
✔ Decentralized Applications (dApps): Architecture and use cases
✔ Security & Trust: Hashing, cryptography, and immutability
✔ Career Paths: Blockchain developer, smart contract engineer, Web3 architect',
            'instructor' => 'Aya Morgan',
            'category' => 'Blockchain & Web3',
            'image' => 'image/blockchain.jpg'
        ],
        [
            'id' => 25,
            'title' => 'Object-Oriented Programming (OOP)',
            'description' => 'Learn to design programs using objects and classes that mirror real-life entities. This course covers key OOP concepts, design patterns, and clean coding techniques for maintainable software.
You will learn about how:
✔ Classes, Objects & Methods
✔ Inheritance & Polymorphism
✔ Abstraction & Encapsulation
✔ SOLID Principles & Design Patterns
✔ Writing clean, reusable code
✔ Career Paths: Software Developer, Backend Engineer',
            'instructor' => 'Julia Edwards',
            'category' => 'Software Development',
            'image' => 'image/oop.jpg'
        ],
        [
            'id' => 26,
            'title' => 'UI/UX Design',
            'description' => 'Learn the fundamentals of user interface and user experience design, including research, prototyping, and usability testing to build intuitive digital products.
You will learn about how:
✔ User Research & Personas
✔ Wireframing & Prototyping
✔ Interaction Design Principles
✔ Usability Testing & Feedback
✔ Tools like Figma, Sketch, Adobe XD
✔ Career Paths: UI Designer, UX Researcher, Product Designer',
            'instructor' => 'Samantha Green',
            'category' => 'Design & Creativity',
            'image' => 'image/uiux.avif'
        ],
        [
            'id' => 27,
            'title' => 'Robotics',
            'description' => 'This course introduces you to the fascinating world of robotics—where software meets hardware. Learn how to build and program robots that can sense, think, and act, using real components and simulation tools.
You will learn about how:
✔ Robotic Systems: Sensors, actuators, microcontrollers
✔ Motion & Control: Kinematics, path planning, and PID control
✔ Embedded Programming: Arduino, Raspberry Pi, and C/C++ basics
✔ Autonomous Behavior: Obstacle avoidance, navigation, decision-making
✔ Simulation Tools: ROS (Robot Operating System), Gazebo
✔ Career Paths: Robotics engineer, embedded systems developer, automation specialist',
            'instructor' => 'Hadi Salah',
            'category' => 'Engineering & Embedded Systems',
            'image' => 'image/robotics.jpg'
        ],
        [
            'id' => 28,
            'title' => 'Deep Learning',
            'description' => 'This course teaches you how to build and train deep learning models using multilayer neural networks. From theory to hands-on coding, you’ll explore how machines recognize images, understand speech, and make predictions.
You will learn about how:
✔ Neural Networks: Perceptrons, multilayer architectures, and activation functions
✔ Training Techniques: Backpropagation, optimizers, regularization
✔ CNNs & RNNs: For image processing, sequences, and time series
✔ Frameworks: TensorFlow, Keras, and PyTorch
✔ Applications: Image classification, NLP, speech recognition
✔ Career Paths: Deep learning engineer, AI researcher, computer vision specialist',
            'instructor' => 'Elena Vasquez',
            'category' => 'AI & Machine Learning',
            'image' => 'image/deep.jpg'
        ],
        [
            'id' => 29,
            'title' => 'Generative AI (GenAI)',
            'description' => 'This course explores the world of generative models that can write text, draw art, compose music, and even simulate human behavior. Learn how GenAI is transforming industries with creativity and automation.
You will learn about how:
✔ Generative Models: GANs, VAEs, and diffusion models
✔ Transformer Architectures: GPT, BERT, and attention mechanisms
✔ Text Generation: Prompt engineering, language models, chatbot creation
✔ AI Art & Media: Text-to-image, deepfakes, and audio generation
✔ Tools: OpenAI APIs, Hugging Face, Runway, Stability AI
✔ Career Paths: GenAI developer, AI artist, creative technologist',
            'instructor' => 'Noah Sinclair',
            'category' => 'AI & Machine Learning',
            'image' => 'image/generative-AI.jpg'
        ],
        [
            'id' => 30,
            'title' => 'Laravel',
            'description' => 'This course teaches you how to develop modern, scalable applications using Laravel — PHP’s most popular framework. From routing to ORM and security, master everything you need to build dynamic full-stack systems.
You will learn about how:
✔ Laravel MVC structure and Blade templating
✔ Routing, middleware, and REST APIs
✔ Eloquent ORM and database migrations
✔ Authentication and authorization
✔ Laravel Mix, queues, and deployment
✔ Career Paths: PHP Developer, Laravel Engineer',
            'instructor' => 'Zara Haddad',
            'category' => 'Web Development',
            'image' => 'image/laravel.jpg'
        ],
        [
            'id' => 31,
            'title' => 'MERN Stack',
            'description' => 'This course takes you through the complete MERN stack to build fully functional web applications — from frontend interfaces to backend APIs and databases.
You will learn about how:
✔ Frontend with React and React Router
✔ Backend with Express and Node.js
✔ Database design with MongoDB & Mongoose
✔ Authentication with JWT
✔ Full-stack integration and deployment
✔ Career Paths: MERN Developer, Full Stack Engineer',
            'instructor' => 'Fatima Rahman',
            'category' => 'Full Stack Development',
            'image' => 'image/mern.jpg'
        ],
        [
            'id' => 32,
            'title' => 'React',
            'description' => 'This course walks you through the React library, helping you develop modern single-page applications with reusable components and reactive state management.
You will learn about how:
✔ JSX and component-based architecture
✔ Props, state, and hooks
✔ Event handling and conditional rendering
✔ React Router and form handling
✔ API integration and deployment
✔ Career Paths: Frontend Developer, React Engineer',
            'instructor' => 'Kevin Abdallah',
            'category' => 'Frontend Development',
            'image' => 'image/react.png'
        ],
        [
            'id' => 33,
            'title' => 'Ruby Programming',
            'description' => 'This course introduces you to Ruby, a flexible, high-level programming language great for beginners and developers looking for elegant syntax and productivity.
You will learn about how:
✔ Ruby syntax, variables, and control flow
✔ OOP concepts in Ruby
✔ File I/O and exception handling
✔ Gems and modules
✔ Scripting and basic automation
✔ Career Paths: Ruby Developer, Automation Engineer',
            'instructor' => 'Elias Moore',
            'category' => 'Programming Languages',
            'image' => 'image/ruby.jpg'
        ],
        [
            'id' => 34,
            'title' => 'Spring Boot',
            'description' => 'This course guides you through the Spring Boot framework, simplifying backend development in Java with powerful tools and auto-configuration features.
You will learn about how:
✔ Spring Boot project structure and dependencies
✔ RESTful services with Spring MVC
✔ Spring Data JPA and Hibernate
✔ Security with Spring Security
✔ Testing and deploying Spring apps
✔ Career Paths: Java Developer, Backend Engineer',
            'instructor' => 'Jamal Sabbah',
            'category' => 'Software Development',
            'image' => 'image/springboot.jpg'
        ],
        [
            'id' => 35,
            'title' => 'Docker',
            'description' => 'This course introduces you to Docker — the industry-standard platform for developing, shipping, and running applications inside containers. You will learn how to isolate environments, build images, and streamline your development and deployment workflow.
You will learn about how:
✔ Containers vs Virtual Machines
✔ Docker CLI, images, volumes, and networks
✔ Writing and managing Dockerfiles
✔ Docker Compose for multi-container apps
✔ Pushing images to Docker Hub
✔ Career Paths: DevOps Engineer, Backend Developer, Cloud Engineer',
            'instructor' => 'Leo Mendez',
            'category' => 'DevOps & Cloud',
            'image' => 'image/docker.jpg'
        ],
        [
            'id' => 36,
            'title' => 'Kubernetes',
            'description' => 'Learn how to automate deployment, scaling, and management of containerized applications using Kubernetes — the leading container orchestration platform. Get hands-on with clusters, pods, services, and real-world deployment workflows.
You will learn about how:
✔ Kubernetes architecture: Nodes, pods, and control plane
✔ Deployments, replicasets, and rolling updates
✔ Services, networking, and ingress controllers
✔ ConfigMaps, Secrets, and persistent storage
✔ Helm charts and CI/CD integrations
✔ Career Paths: Kubernetes Admin, DevOps Engineer, Cloud Architect',
            'instructor' => 'Nour Hanna',
            'category' => 'DevOps & Cloud',
            'image' => 'image/kubernetes.webp'
        ],
        [
            'id' => 37,
            'title' => '.Net Development',
            'description' => 'Learn how to build robust, high-performance applications using the Microsoft .NET ecosystem, including ASP.NET Core, C#, and the Entity Framework.
You will learn about how:
✔ ASP.NET Core MVC and Web APIs
✔ C# programming fundamentals
✔ Entity Framework & LINQ
✔ Authentication, authorization, and security
✔ Deployment to IIS, Azure, or Docker
✔ Career Paths: .NET Developer, Software Engineer',
            'instructor' => 'Samir Clarke',
            'category' => 'Software Development',
            'image' => 'image/net.webp'
        ],
        [
            'id' => 38,
            'title' => 'C# Programming',
            'description' => 'This course teaches you how to write clean, efficient, and scalable code using C#. From syntax and OOP to LINQ and async programming, you’ll gain all the skills needed for desktop, web, and enterprise applications.
You will learn about how:
✔ C# syntax, data types, and control structures
✔ Object-Oriented Programming (OOP) with classes and interfaces
✔ Exception handling and file I/O
✔ Working with collections, LINQ, and generics
✔ Asynchronous programming with async/await
✔ Career Paths: .NET Developer, Software Engineer, Game Developer (Unity)',
            'instructor' => 'Jordan Blake',
            'category' => 'Programming Languages',
            'image' => 'image/csharp.webp'
        ],
        [
            'id' => 39,
            'title' => 'Angular',
            'description' => 'This course teaches you how to use Angular, a popular TypeScript-based framework for creating rich, single-page applications. Learn component-based architecture, routing, forms, and state management to build modern web apps.
You will learn about how:
✔ Angular components, modules, and services
✔ Data binding and event handling
✔ Routing and navigation
✔ Forms and validation
✔ State management with RxJS and NgRx
✔ Career Paths: Frontend Developer, Angular Engineer',
            'instructor' => 'Lena Foster',
            'category' => 'Frontend Development',
            'image' => 'image/angular.jpg'
        ],
        [
            'id' => 40,
            'title' => 'Theory of Computation',
            'description' => 'This course dives into formal languages, automata theory, and computational complexity. Understand how computers solve problems, what’s computable, and the limits of computation.
You will learn about how:
✔ Automata: DFA, NFA, and pushdown automata
✔ Formal languages and grammars
✔ Turing machines and decidability
✔ Complexity classes and reductions
✔ Applications in algorithms and language processing
✔ Career Paths: Computer Scientist, Algorithm Engineer, Researcher',
            'instructor' => 'Michael Turner',
            'category' => 'Computer Science Fundamentals',
            'image' => 'image/theory.jpg'
        ],
        [
            'id' => 41,
            'title' => 'MATLAB',
            'description' => 'This course teaches you how to use MATLAB for algorithm development, data visualization, and simulation across engineering and scientific domains. Learn matrix operations, plotting, and toolboxes for real-world problem solving.
You will learn about how:
✔ MATLAB syntax and programming basics
✔ Matrix and array operations
✔ Data visualization and plotting
✔ Signal processing and control systems
✔ Using built-in toolboxes for engineering applications
✔ Career Paths: Data Analyst, Engineer, Researcher',
            'instructor' => 'Amina Hassan',
            'category' => 'Engineering & Data Science',
            'image' => 'image/matlab.webp'
        ],
        [
            'id' => 42,
            'title' => 'Hadoop',
            'description' => 'Learn how to store, process, and analyze massive datasets using Hadoop’s distributed computing framework. This course covers HDFS, MapReduce, and common Hadoop ecosystem components.
You will learn about how:
✔ Hadoop architecture and HDFS
✔ MapReduce programming model
✔ Working with Hive and Pig
✔ Data ingestion and processing pipelines
✔ Integrating Hadoop with other big data tools
✔ Career Paths: Big Data Engineer, Data Engineer, Hadoop Developer',
            'instructor' => 'Daniel Jaafar',
            'category' => 'Big Data & Analytics',
            'image' => 'image/hadoop.jpp'
        ],
        [
            'id' => 43,
            'title' => 'Computer Hardware',
            'description' => 'This course teaches you about the architecture and operation of computer hardware, from microprocessors to memory systems. Gain insights into how hardware and software interact to make computers work.
You will learn about how:
✔ Computer architecture basics: CPU, RAM, storage
✔ Digital logic and circuits
✔ Input/output devices and buses
✔ Memory hierarchy and cache design
✔ Assembly language introduction
✔ Career Paths: Hardware Engineer, Systems Architect, Embedded Systems Developer',
            'instructor' => 'Hassan Fawaz',
            'category' => 'Engineering & Computer Science',
            'image' => 'image/computer_hardware.webp'
        ],
        [
            'id' => 44,
            'title' => 'Foundations of Computer Science',
            'description' => 'This course covers the fundamental principles that underpin computing, including algorithms, data structures, and problem-solving techniques. It’s perfect for anyone starting their journey in computer science.
You will learn about how:
✔ Algorithm design and analysis
✔ Basic data structures: arrays, lists, trees, and graphs
✔ Problem-solving strategies and computational thinking
✔ Introduction to programming concepts
✔ Mathematical logic and discrete structures
✔ Career Paths: Software Developer, Computer Scientist, Analyst',
            'instructor' => 'Julia Kantar',
            'category' => 'Computer Science Fundamentals',
            'image' => 'image/foundation.jpg'
        ],
        [
            'id' => 45,
            'title' => 'Kotlin Programming',
            'description' => 'This course introduces you to Kotlin, the preferred language for Android development. You will learn everything from basic syntax to working with Android Studio, building powerful and user-friendly mobile applications.
You will learn about how:
✔ Kotlin syntax, variables, functions, and null safety
✔ Object-oriented and functional programming in Kotlin
✔ Android app development using Kotlin and Android Studio
✔ Coroutines for asynchronous programming
✔ Integrating APIs and managing app data
✔ Career Paths: Android Developer, Mobile Engineer, Kotlin Developer',
            'instructor' => 'Sami Shouman',
            'category' => 'Mobile Development',
            'image' => 'image/kotlin.webp'
        ],
        [
            'id' => 46,
            'title' => 'Swift Programming',
            'description' => 'This course teaches you Swift, the modern programming language for iOS and macOS development. Learn to build sleek and performant mobile apps for Apple devices using Xcode and SwiftUI.
You will learn about how:
✔ Swift syntax, control flow, and optionals
✔ Classes, structs, and protocols in Swift
✔ SwiftUI for declarative UI design
✔ Building iOS apps with Xcode
✔ Navigation, state management, and animations
✔ Career Paths: iOS Developer, Mobile App Developer, Swift Engineer',
            'instructor' => 'Oliver Bennett',
            'category' => 'Mobile Development',
            'image' => 'image/swift.jpg'
        ],
        [
            'id' => 47,
            'title' => 'Firebase',
            'description' => 'This course teaches you how to use Firebase to create responsive, scalable, and real-time applications without managing a traditional backend. From authentication to cloud storage and database syncing, Firebase powers modern web and mobile experiences.
You will learn about how:
✔ Firebase Realtime Database and Firestore
✔ User Authentication (email, Google, GitHub, etc.)
✔ Cloud Functions and serverless logic
✔ Firebase Storage for files and media
✔ Hosting, analytics, and security rules
✔ Career Paths: Mobile Developer, Full Stack Developer, Firebase Specialist',
            'instructor' => 'Isabella Nehme',
            'category' => 'Backend & Cloud',
            'image' => 'image/firebase.png'
        ],
        [
            'id' => 48,
            'title' => 'Flutter Development',
            'description' => 'This course teaches you how to use Flutter, Google’s UI toolkit, to develop high-performance mobile, web, and desktop apps. Combine it with Dart to create slick, native-looking interfaces with fast development cycles.
You will learn about how:
✔ Flutter architecture and widget tree
✔ Stateless vs Stateful widgets
✔ Navigation, forms, and animations
✔ State management (Provider, Riverpod, or Bloc)
✔ Firebase integration and REST APIs
✔ Career Paths: Flutter Developer, Cross-Platform App Developer, Mobile Engineer',
            'instructor' => 'Layla Moreno',
            'category' => 'Mobile Development',
            'image' => 'image/flutter.jpg'
        ],
        [
            'id' => 49,
            'title' => 'Operating System',
            'description' => 'This course explores how operating systems manage hardware and software resources. Learn the inner workings of memory, processes, file systems, and how systems ensure security and multitasking.
You will learn about how:
✔ OS architecture and components
✔ Process management and CPU scheduling
✔ Memory management and virtual memory
✔ File systems and I/O management
✔ Threads, concurrency, and synchronization
✔ Career Paths: Systems Engineer, OS Developer, IT Administrator',
            'instructor' => 'Sofia Karim',
            'category' => 'IT & Computer Science',
            'image' => 'image/os.jpeg'
        ],
        [
            'id' => 50,
            'title' => 'Digital Logic Design',
            'description' => 'This course teaches the core principles of digital systems and binary logic that form the foundation of all computer hardware. From logic gates to combinational circuits, you will gain a deep understanding of how digital electronics work.
You will learn about how:
✔ Number systems: Binary, octal, hexadecimal
✔ Logic gates: AND, OR, NOT, NAND, NOR, XOR
✔ Combinational circuits: Adders, multiplexers, encoders, decoders
✔ Sequential circuits: Flip-flops, registers, counters
✔ Boolean algebra and Karnaugh maps
✔ Career Paths: Embedded Systems Engineer, Hardware Designer, Computer Engineer',
            'instructor' => 'George Frangieh',
            'category' => 'Engineering & Hardware',
            'image' => 'image/logic.jpg'
        ],
        [
            'id' => 51,
            'title' => 'Scala Programming',
            'description' => 'This course introduces Scala, a powerful JVM language combining object-oriented and functional programming paradigms. Ideal for backend development, big data, and reactive systems.
You will learn about how:
✔ Scala syntax and basics
✔ Functional programming concepts
✔ Collections and pattern matching
✔ Working with Akka for concurrency
✔ Integration with Java and frameworks like Play
✔ Career Paths: Scala Developer, Backend Engineer, Big Data Engineer',
            'instructor' => 'Ahmad Ali',
            'category' => 'Programming Languages',
            'image' => 'image/scala.jpg'
        ],
        [
            'id' => 52,
            'title' => 'Pascal Programming',
            'description' => 'This course covers Pascal, a classic structured programming language that’s great for understanding fundamental programming and algorithm design.
You will learn about how:
✔ Pascal syntax and program structure
✔ Data types, variables, and control statements
✔ Procedures and functions
✔ File handling and arrays
✔ Writing clean, modular code
✔ Career Paths: Software Developer, Educator, Algorithm Specialist',
            'instructor' => 'Linda Morales',
            'category' => 'Programming Languages',
            'image' => 'image/pascal.webp'
        ],
        [
            'id' => 53,
            'title' => 'Landing a Tech Job',
            'description' => 'This course guides you through every step of getting hired in the tech industry — from building a standout resume to mastering technical interviews and negotiating offers. Whether you are a beginner or a bootcamp graduate, you’ll learn how to showcase your skills, grow your network, and find the right role in software, IT, data, or design.
You will learn about how:
✔ Choosing a career path: Developer, analyst, engineer, designer
✔ Building a tech portfolio (GitHub, personal site, projects)
✔ Writing resumes and LinkedIn profiles that get noticed
✔ Preparing for behavioral and technical interviews
✔ Navigating coding challenges and whiteboard problems
✔ Career Paths: Software Engineer, Data Analyst, IT Specialist, UI/UX Designer',
            'instructor' => 'Rachelle Mourad',
            'category' => 'Career Development',
            'image' => 'image/job.jpg'
        ],
        [
            'id' => 54,
            'title' => 'Game Development with Godot',
            'description' => 'This course teaches you how to build games using Godot, a lightweight, beginner-friendly, and fully open-source game engine. You will learn the fundamentals of game design, scripting with GDScript, and how to bring your ideas to life through hands-on projects.
You will learn about how:
✔ Godot interface, scene system, and node structure
✔ Scripting with GDScript for player input and logic
✔ Physics, collisions, UI, and audio
✔ Building 2D and 3D environments
✔ Exporting games to PC, web, or mobile
✔ Career Paths: Indie Game Developer, Technical Artist, Gameplay Programmer',
            'instructor' => 'Elias Jawhari',
            'category' => 'Game Development',
            'image' => 'image/godot.jpg'
        ],
        [
            'id' => 55,
            'title' => 'Web Development with Django',
            'description' => 'This course introduces Django — a high-level Python web framework that encourages rapid development and clean, pragmatic design. You will learn to create dynamic websites, work with databases, manage users, and deploy full-featured web apps with ease.
You will learn about how:
✔ Django architecture: MTV (Model-Template-View) pattern
✔ Setting up projects, apps, and URL routing
✔ Creating models and interacting with databases using ORM
✔ Building views, templates, and forms
✔ Authentication, authorization, and admin interface
✔ Deployment and production best practices
✔ Career Paths: Backend Developer, Full Stack Developer, Web Engineer',
            'instructor' => 'Fatima Rahman',
            'category' => 'Full Stack Development',
            'image' => 'image/django.png'
        ],
        [
            'id' => 56,
            'title' => 'API Development',
            'description' => 'This course teaches you how to design, build, and integrate Application Programming Interfaces (APIs) — the backbone of modern software systems. Whether you are developing RESTful services or working with third-party APIs, you will gain the skills to make your apps more powerful and connected.
You will learn about how:
✔ What APIs are and how they work
✔ Designing RESTful APIs (resources, methods, routes)
✔ Building APIs with Node.js, Express, Django, or Flask
✔ Authentication and authorization with tokens (JWT, OAuth)
✔ Consuming external APIs and handling responses
✔ Documentation with Swagger/OpenAPI
✔ Career Paths: Backend Developer, Full Stack Developer, API Engineer',
            'instructor' => 'Jason Kim',
            'category' => 'Backend Development',
            'image' => 'image/api.avif'
        ],
        [
            'id' => 57,
            'title' => 'Game Theory',
            'description' => 'This course introduces Game Theory — the mathematical study of strategy and interaction between rational agents. From zero-sum games to Nash equilibrium, you will explore how choices affect outcomes in economics, politics, AI, and real-world conflict.
You will learn about how:
✔ Core concepts: players, payoffs, and strategies
✔ Types of games: cooperative vs non-cooperative, simultaneous vs sequential
✔ Nash equilibrium and dominant strategies
✔ Applications in economics, negotiation, and AI
✔ Game trees, mixed strategies, and repeated games
✔ Career Paths: AI Researcher, Economist, Game Designer, Data Scientist',
            'instructor' => 'Elena Khalil',
            'category' => 'Mathematics & AI',
            'image' => 'image/Game_Theory.webp'
        ],
        [
            'id' => 58,
            'title' => 'Lua Programming',
            'description' => 'This course teaches you Lua, a simple yet powerful scripting language used in game engines like Roblox and Corona, as well as embedded systems. You will learn how to write clean and efficient code, integrate Lua with other systems, and build your own scripts from scratch.
You will learn about how:
✔ Lua syntax, variables, functions, and tables
✔ Control flow: loops, conditionals, and scoping
✔ Metatables and object-oriented patterns in Lua
✔ Embedding Lua in games and apps (e.g., with C++)
✔ Using Lua in platforms like Roblox, Love2D, and game engines
✔ Career Paths: Game Scripter, Embedded Developer, Tool Programmer',
            'instructor' => 'Alaa Alaaeddine',
            'category' => 'Game Development & Scripting',
            'image' => 'image/lua.png'
        ],
        [
            'id' => 59,
            'title' => 'Go Programming(Golang)',
            'description' => 'This course teaches you Go (also known as Golang), a statically typed language developed by Google that’s known for simplicity, concurrency, and performance. Whether you are building backend APIs, cloud services, or CLI tools, Go helps you write clean and efficient code with ease.
You will learn about how:
✔ Go syntax, types, functions, and packages
✔ Error handling and control structures
✔ Working with structs, interfaces, and methods
✔ Concurrency with goroutines and channels
✔ File I/O, networking, and building web servers
✔ Career Paths: Backend Developer, DevOps Engineer, Cloud Developer, Systems Engineer',
            'instructor' => 'Ziad Karaki',
            'category' => 'Backend Development',
            'image' => 'image/golang.jpg'
        ],
        [
            'id' => 60,
            'title' => 'Rust Programming',
            'description' => 'This course teaches you how to use Rust — a modern systems programming language that empowers you to write high-performance code without sacrificing safety. You will learn Rust’s ownership model, lifetimes, and powerful type system while building real-world applications.
You will learn about how:
✔ Rust syntax, variables, and control flow
✔ Ownership, borrowing, and lifetimes
✔ Structs, enums, traits, and pattern matching
✔ Error handling (Result, Option, panic)
✔ File I/O, command-line tools, and multithreading
✔ Career Paths: Systems Developer, Backend Engineer, Embedded Developer, Blockchain Engineer',
            'instructor' => 'Moustafa AbdelRahim',
            'category' => 'Systems Programming',
            'image' => 'image/rust.webp'
        ]
    ]
];


foreach ($data_files as $file => $default_data) {
    if (!file_exists(DATA_PATH . '/' . $file)) {
        file_put_contents(DATA_PATH . '/' . $file, json_encode($default_data));
    }
}

// Helper functions
function getData($file)
{
    $content = file_get_contents(DATA_PATH . '/' . $file);
    return json_decode($content, true);
}

function saveData($file, $data)
{
    file_put_contents(DATA_PATH . '/' . $file, json_encode($data));
}

function redirect($url)
{
    header("Location: $url");
    exit();
}
