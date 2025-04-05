<div class="projects-heading">
            <h1>Personal Projects</h1>
        </div>

        <div class="projects" id="projects-1">
            <h1>1. Personal Website</h1>
            <h2>Overview</h2>
            <h3 id="1-aims">1.1 Project Aims:</h3>
            <p>The primary aim of this project is to develop a personal portfolio website
                that showcases my skills and projects in the field of technology. The 
                website is intended to be a dynamic platform where I can share technical
                blogs, aiming to benefit my peers in the industry. Another key goal is
                to ensure the website evolves over time, mirroring my professional growth.</p>
            <h3 id="1-features">1.2 Project Features:</h3>
            <ul>
                <li>
                    Skills Page:
                    <p>A section dedicated to highlighting my technical skills in various areas.</p>
                </li>
                <li>
                    Projects Page:
                    <p>Features descriptions of projects I've worked on, with links to their 
                        respective GitHub repositories for in-depth view.</p>
                </li>
                <li>
                    About Me Page:
                    <p>This section provides insights into my personal interests and 
                        professional journey.</p>
                </li>
                <li>
                    Blog Page:
                    <p>A space for sharing my knowledge and insights on various tech-related
                        topics, aimed at benefiting peers in the industry.</p>
                </li>
            </ul>
            <h3 id="1-demographic">1.3 Demographic</h3>
            <p>The website is primarily targeted towards recruiters, fellow IT professionals, 
                and anyone interested in collaboration or learning more about my professional 
                expertise. It's designed to cater to individuals seeking in-depth knowledge 
                of my skills, projects, and professional journey.</p>
            <h3 id="1-tech">1.4 Technologies Used</h3>
            <h4>1.4.1 Programming Language/s</h4>
            <ul>
                <li>
                    HTML, CSS, and JavaScript:
                    <p>The core building blocks of the website, providing structure, style,
                        and interactivity respectively.</p>
                </li>
            </ul>
            <h4>1.4.2 Frameworks/Libraries</h4>
            <ul>
                <li>
                    NuxtJS 3:
                    <p>Utilized to enhance the website's performance and user experience,
                        bringing in features and optimizations that are essential for a 
                        modern web application.</p>
                </li>
            </ul>
            <h4>1.4.3 Tools</h4>
            <ul>
                <li>
                    Visual Studio Code:
                    <p>Utilized to enhance the website's performance and user experience,
                        bringing in features and optimizations that are essential for a 
                        modern web application.</p>
                </li>
                <li>
                    GitHub:
                    <p>Used for version control, enabling efficient management and sharing
                        of the project's source code. Linked to cloudflare to enable automatic 
                        deployment upon new push requests</p>
                </li>
                <li>
                    Azure:
                    <p>Employed for project organization and management, using its wikis 
                        and boards features for effective collaboration and tracking.</p>
                </li>
                <li>
                    Cloudflare:
                    <p>Chosen for hosting the website and providing essential security
                        measures like DDoS mitigation.</p>
                </li>
            </ul>
            <h3 id="1-repo">1.5 Link to repository:</h3>
            <p>For more details and insights into the rishan.dev project, feel free to explore the GitHub 
                repository: 
            </p>
            <a href="https://github.com/rishan-tk/rishan.dev">
                <i class="fab fa-github"></i>
                Respository Link
            </a>
        </div>

        <div class="projects" id="projects-2">
            <h1>2. Discord Music Bot</h1>
            <h2>Overview</h2>
            <h3 id="2-aims">2.1 Project Aims:</h3>
            <p>The primary goal of this project is to develop a customized Discord Music
                Bot for personal use. Its core purpose is to improve the music streaming
                experience within a Discord server. The aim is to provide users and their
                friends with a more personalized and enjoyable musical experience, 
                elevating the usual interactions on the platform.
            </p>

            <h3 id="2-features">2.2 Project Features:</h3>
            <ul>
                <li>
                    Search and Play:
                    <p>Users can play music in the server by typing a search query, similar
                        to using a YouTube search bar, or by providing a YouTube URL.
                    </p>
                </li>
                <li>
                    Queue Management:
                    <p>Songs can be queued up automatically. Users have the flexibility to type
                        in the next song they want to hear, seamlessly adding it to the queue.
                    </p>
                </li>
                <li>
                    Rearrange Queue:
                    <p>The bot allows for easy rearrangement of the queued songs, giving users
                        complete control over the order of music playback.
                    </p>
                </li>
                <li>
                    Skip Songs:
                    <p>If a song isn't fitting the mood, users have the option to skip it and move 
                        on to the next track in the queue effortlessly.
                    </p>
                </li>
            </ul>
            <h3 id="2-demographic">2.3 Demographic:</h3>
            <p>The Discord Music Bot is primarily designed for individuals or groups who 
                frequently use Discord for social interactions and seek a more enhanced and
                user-friendly music experience. It caters to users who enjoy sharing and 
                listening to music together in a community setting, such as friends, gaming 
                groups, or any Discord server members looking to add a musical element to 
                their digital gatherings.
            </p>
            <h3 id="2-tech">2.4 Technologies Used</h3>
            <h4>2.4.1 Programming Language/s:</h4>
            <ul>
                <li>
                    Python:
                    <p>Python was the natural choice for this project due to its simplicity,
                        readability, and a vast array of libraries and frameworks specifically
                        tailored for web applications and automation tasks. Its ease of use
                        and straightforward syntax allowed for swift development and quick 
                        prototyping. Python's extensive community support, rich documentation,
                        and active developer ecosystem meant that troubleshooting and finding
                        solutions to challenges were readily accessible. Moreover, Python's 
                        asynchronous capabilities, crucial for handling concurrent tasks 
                        like managing multiple server requests and streaming music seamlessly,
                        made it an ideal language for this Discord Music Bot project.
                    </p>
                </li>
            </ul>
            <h4>2.4.2 Frameworks/Libraries:</h4>
            <ul>
                <li>
                    Discord.py:
                    <p>Discord.py is a Python wrapper for 
                        the Discord API, enabling the bot to interact with 
                        Discord servers and users effectively.
                    </p>
                </li>
                <li>
                    ytdl Library:
                    <p>The ytdl library is used for extracting audio
                        from YouTube videos, enhancing the bot's ability to stream
                        music directly from YouTube sources.
                    </p>
                </li>
                <li>
                    Asyncio:
                    <p>The asyncio library was instrumental in enabling concurrent
                    operations for the Discord Music Bot. By implementing asynchronous 
                    programming techniques, it facilitated non-blocking execution, allowing
                    the bot to handle multiple tasks simultaneously. This approach ensured
                    the bot's responsiveness during various operations, enhancing efficiency
                    and user experience. Through asyncio, the bot managed concurrent user 
                    commands, music playback, and real-time events, delivering a seamless
                    and dynamic interaction environment for both you and your friends.
                </p>
                </li>
            </ul>
            <h4>2.4.3 Tools</h4>
            <ul>
                <li>
                    Visual Studio Code:
                    <p>The primary integrated development environment (IDE) used for developing
                        the project, providing a range of development tools and a user-friendly interface.
                    </p>
                </li>
                <li>
                    AWS EC2:
                    <p>The bot is hosted on Amazon Web Services (AWS) EC2, which ensures its 24/7 availability. 
                        This cloud-based hosting solution guarantees the bot's continuous operation and consistent 
                        performance.
                    </p>
                </li>
            </ul>

            <h3 id="2-repo">2.5 Link to repository:</h3>
            <p>For more details and insights into the Discord Music Bot project, feel free to explore the GitHub 
                repository: 
            </p>
            <a href="https://github.com/rishan-tk/Jaskier-v3">
                <i class="fab fa-github"></i>
                Respository Link
            </a>
        </div>

        <div class="projects" id="projects-3">
            <h1>3. Telegram E-Commerce Shop Bot</h1>
            <h2>Overview</h2>
            <h3 id="3-aims">3.1 Aim of Project</h3>
            <h3 id="3-features">3.2 Key features</h3>
            <h3 id="3-demographic">3.3 Demographic</h3>

            <h3 id="3-tech">3.4 Technologies Used</h3>
            <h4>3.4.1 Languages</h4>
            <h4>3.4.2 Frameworks/Libraries</h4>
            <h4>3.4.3 Tools</h4>

            <h3 id="3-repo">3.5 Link to repo</h3>

            <p>read more here</p>
        </div>

        <div class="projects-heading">
            <h1>Academic Projects</h1>
        </div>

        <div class="projects" id="projects-4">
            <h1>4. Movie Database</h1>
            <h2>Overview</h2>
            <h3 id="4-aims">4.1 Aim of Project</h3>
            <h3 id="4-features">4.2 Key features</h3>
            <h3 id="4-demographic">4.3 Demographic</h3>

            <h3 id="5-tech">4.4 Technologies Used</h3>
            <h4>4.4.1 Languages</h4>
            <h4>4.4.2 Frameworks/Libraries</h4>
            <h4>4.4.3 Tools</h4>

            <h3 id="4-repo">4.5 Link to repo</h3>

            <p>read more here</p>
        </div>

        <div class="projects" id="projects-5">
            <h1>5. 2D Platformer - Graphics 1 Project</h1>
            <h2>Overview</h2>
            <h3 id="5-aims">5.1 Project Aims:</h3>
            <p>The primary aim of the 2D Platformer Graphics 1 Project was to build a fully functional 
                2D platformer level. Key objectives included mastering the use of OpenGL for graphical
                representations and implementing core gameplay mechanics typically found in platformer 
                games. The project was also an opportunity to explore and apply fundamental concepts of 
                graphics programming within a practical scenario.</p>
            <h3 id="5-features">5.2 Project Features:</h3>
            <ul>
                <li>
                    Level Design:
                    <p>A carefully crafted level that showcases various elements typical of platformer games,
                        including obstacles, platforms, and interactive elements.</p>
                </li>
                <li>
                    Graphics Rendering:
                    <p>Utilization of OpenGL for rendering 2D graphics, demonstrating the capability 
                        to handle graphical elements within the gaming environment.</p>
                </li>
                <li>
                    Game Mechanics:
                    <p>Implementation of basic mechanics such as jumping, moving, and 
                        collision detection, essential for the platformer genre.</p>
                </li>
            </ul>
            <h3 id="5-demographic">5.3 Demographic</h3>
            <p>This project was primarily aimed at fulfilling academic requirements and 
                demonstrating skills in graphics programming. It is of interest to educators,
                fellow students, and anyone with a passion for game development and graphics programming.</p>
            <h3 id="5-tech">5.4 Technologies Used</h3>
            <h4>5.4.1 Programming Language/s</h4>
            <ul>
                <li>
                    C++:
                    <p>The primary programming language used for developing the game logic and 
                        interfacing with OpenGL for graphics rendering.</p>
                </li>
            </ul>
            <h4>5.4.2 Frameworks/Libraries</h4>
            <ul>
                <li>
                    OpenGL:
                    <p>A cross-language, cross-platform application programming interface (API) 
                        for rendering 2D and 3D vector graphics, used to create all the graphical 
                        elements in the game.</p>
                </li>
                <li>
                    PicoPNG:
                    <p>Integrated into the project to decode PNG files, PicoPNG is used for 
                        handling and processing image files, making it possible to incorporate 
                        detailed graphics and textures in the game.</p>
                </li>
            </ul>
            <h4>5.4.3 Tools</h4>
            <ul>
                <li>
                    Visual Studio 2017:
                    <p>The integrated development environment (IDE) used for writing, 
                        compiling, and debugging the code. It provided a robust platform 
                        for C++ development and OpenGL integration.</p>
                </li>
                <li>
                    GitHub:
                    <p>Used for version control, enabling efficient management and sharing
                        of the project's source code. Linked to cloudflare to enable automatic 
                        deployment upon new push requests</p>
                </li>
            </ul>
            <h3 id="5-repo">5.5 Link to repository:</h3>
            <p>For more details and insights into the 2D Platformer project, feel free to explore the GitHub 
                repository: 
            </p>
            <a href="https://github.com/rishan-tk/UnchartedTerritory">
                <i class="fab fa-github"></i>
                Respository Link
            </a>
        </div>

        <div class="projects-heading">
            <h1>Work-In-Progress Projects</h1>
        </div>

        <div class="projects" id="project-6">
            <h1>6. Landlord Management System</h1>
            <h2>Overview</h2>
            <h3 id="6-aims">6.1 Project Aims:</h3>
            <p>The primary aim of this project is to create an application to help manage the business for landlords, 
                whether it's a single person or a company.</p>
            <h3 id="6-features">6.2 Project Features:</h3>
            <ul>
                <li>
                    All in one place to view organised documents
                    <p>All documents related to the business can be scanned or added to the software to keep track</p>
                </li>
                <li>
                    OCR Document Scanner:
                    <p>To help automatically scan and organise documents relating to the business while importing 
                        the data into the software to also be saved. </p>
                </li>
                <li>
                    Visualise expenses:
                    <p>Options of graphs will be available to visualise the expenses of the business, 
                        such as an overview of gas costs over the year for the individual property</p>
                </li>
            </ul>
            <h3 id="6-demographic">6.3 Demographic</h3>
            <p>This project was primarily aimed at small-scale landlords who need to incorporate technology 
                into their business to keep up with the times.</p>
            <h3 id="6-tech">3.3 Technologies Used</h3>
            <h4>6.4.1 Programming Language/s</h4>
            <ul>
                <li>
                    C++:
                    <p>The primary programming language used for developing the logic and 
                        models of the software.</p>
                </li>
            </ul>
            <h4>6.4.2 Frameworks/Libraries</h4>
            <ul>
                <li>
                    Qt:
                    <p>A cross-language, cross-platform application programming interface (API) 
                        for rendering 2D and 3D vector graphics, used to create all the graphical 
                        elements in the game.</p>
                </li>
            </ul>
            <h4>6.4.3 Tools</h4>
            <ul>
                <li>
                    Visual Studio 2022:
                    <p>The integrated development environment (IDE) used for writing, 
                        compiling, and debugging the code. It provided a robust platform 
                        for C++ development and OpenGL integration.</p>
                </li>
                <li>
                    GitHub:
                    <p>Used for version control, enabling efficient management and sharing
                        of the project's source code. Linked to cloudflare to enable automatic 
                        deployment upon new push requests</p>
                </li>
            </ul>
            <h3 id="6-repo">6.5 Repository Link</h3>
            <p>For more details and insights into the Landlord Managment System, feel free to explore the GitHub 
                repository: 
            </p>
            <a href="https://github.com/rishan-tk/LandlordManagementSystem">
                <i class="fab fa-github"></i>
                Respository Link
            </a>