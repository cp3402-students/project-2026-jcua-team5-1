# Development & Deployment Workflow

## Table of Contents
1. [Development Workflow - Project Management](#development-workflow---project-management)
2. [Development Workflow - Setting Up Docker](#development-workflow---setting-up-docker)
3. [Development Workflow - Using Docker](#development-workflow---using-docker)
4. [Development Workflow - Typical Theme Example](#development-workflow---typical-theme-example)
5. [Development Workflow - Typical Content Example](#development-workflow---typical-content-example)
6. [Deployment Workflow - Staging Environment](#deployment-workflow---staging-environment)
    * [Initialising the Staging Site](#initialising-the-staging-site)
    * [Deploying the Staging Site Content](#deploying-the-staging-site-content)
7. [Deployment Workflow - Production Environment](#deployment-workflow---production-environment)
    * [Initialising the Production Site](#initialising-the-production-site)
    * [Deploying the Production Site Content](#deploying-the-production-site-content)


## Development Workflow - Project Management
1. Open Trello board:
    ```
    https://trello.com/b/hM7n4mzI
    ```

2. Create a new card in 'Inbox'.
    * Add a description of the task.
    * Add a due date, if relevant.

3. Move the chosen card into 'Next Actions' to reflect upcoming tasks.
    * This can be done by:
      * Dragging the chosen card between lists, or 
      * Selecting the 'Next Actions' list from the card description page.

4. Move the chosen card into 'In Progress' to notify team members.
    * This can be done by:
      * Dragging the chosen card between lists, or 
      * Selecting the 'In Progress' list from the card description page. 

5. Join the chosen card you're working on, or assign team members to their respective cards.
    * Mark the chosen card as completed when finished.

6. Move the chosen card into 'In Review' for someone else to check.
    * This can be done by:
        * Dragging the chosen card between lists, or
        * Selecting the 'In Review' list from the card description page.

7. Move the chosen card into 'Done' for everyone to clearly see.
    * This can be done by:
        * Dragging the chosen card between lists, or
        * Selecting the 'Done' list from the card description page.


## Development Workflow - Setting Up Docker
1. Download Docker Desktop (Windows, Mac):
    ```
    https://www.docker.com/
    ```

2. Make sure a `compose.yaml` file is defined in the wp-docker directory:
    ```yaml
    services:
      db:
        image: mysql:8.0
        container_name: tennisblast_db
        restart: unless-stopped
        environment:
          MYSQL_DATABASE: ${MYSQL_DATABASE}
          MYSQL_USER: ${MYSQL_USER}
          MYSQL_PASSWORD: ${MYSQL_PASSWORD}
          MYSQL_ROOT_PASSWORD: ${MYSQL_ROOT_PASSWORD}
        volumes:
          - db_data:/var/lib/mysql
    
      wordpress:
        image: wordpress:latest
        container_name: tennisblast_wp
        restart: unless-stopped
        depends_on:
          - db
        ports:
          - "8080:80"
        environment:
          WORDPRESS_DB_HOST: ${WORDPRESS_DB_HOST}
          WORDPRESS_DB_NAME: ${WORDPRESS_DB_NAME}
          WORDPRESS_DB_USER: ${WORDPRESS_DB_USER}
          WORDPRESS_DB_PASSWORD: ${WORDPRESS_DB_PASSWORD}
        volumes:
          - ../wp-content/themes/kc-tennis-blast:/var/www/html/wp-content/themes/kc-tennis-blast
    
    volumes:
      db_data:
    ```

3. Ensure that a `.env` file is defined in the wp-docker directory (for EXAMPLE):
    ```
    MYSQL_DATABASE=wordpress
    MYSQL_USER=wordpress
    MYSQL_PASSWORD=wordpress
    MYSQL_ROOT_PASSWORD=rootpassword
    
    WORDPRESS_DB_HOST=db:3306
    WORDPRESS_DB_NAME=wordpress
    WORDPRESS_DB_USER=wordpress
    WORDPRESS_DB_PASSWORD=dbpassword
    ```

4. Create a `themes` directory in the wp-content directory (and create parent directories as needed):
    ```
    mkdir -p wp-content/themes
    ```

5. Clone the repo (or a specific branch) in the directory:
    ```
    git clone https://github.com/cp3402-students/project-2026-jcua-team5-1.git
    ```


## Development Workflow - Using Docker
1. Fetch all changes:
    ```
    git fetch --all
    ```
   
2. Pull all changes:
    ```
    git pull
    ```
   
3. Run Docker containers:
    ```
    docker compose up -d
    ```
   
4. Stop Docker containers when finished:
    ```
    docker compose down
    ```


## Development Workflow - Typical Theme Example
1. Fetch all changes:
    ```
    git fetch --all
    ```

2. Pull all changes:
    ```
    git pull
    ```

3. Create a new branch prior to modification and switch into it (best practice) to separate working files from main files:
    ```
    git branch homepage-customisation
    git checkout -b homepage-customisation
    ```

4. Run Docker containers:
    ```
    docker compose up -d
    ```

5. Modify something:
   * For example, functions.php and/or style.css file/s.

6. Publish branch:
    ```
    git push -u origin homepage-customisation
    ```

7. In GitHub, create a pull request.
    * Use a clear description of the changes for team members to review.

8. Stop Docker containers when finished:
    ```
    docker compose down
    ```


## Development Workflow - Typical Content Example
1. Log into localhost WordPress website as admin.

2. Add page and curate content.

3. Publish content.

4. Export contents via the built-in export tool in WordPress.
    * Select Pages
    * Apply additional filters if necessary
    * .xml file will download

5. Import contents into staging website via the built-in import tool in WordPress.
    * Run WordPress Importer from Import tab
    * Select downloaded .xml file of relevant content
    * Upload file and import
    * Select 'Download and import file attachments'
    * Submit
    * Verify that all content has been imported successfully, and identify any items that failed to import.

6. Notify team members of the changes that were made.


## Deployment Workflow - Staging Environment

### Initialising the Staging Site
x


### Deploying the Staging Site Content
1. In the localhost website, Log in to WordPress admin.

2. Navigate to 'Tools'.

3. Select export and download file.

4. In the staging website, log in to WordPress admin.

5. Import downloaded file.

6. Select 'Download and import file attachments' if relevant.

7. Confirm that the imported content appears correctly on the staging site.

8. Notify team members that the staging site is ready for review.


## Deployment Workflow - Production Environment

### Initialising the Production Site
x


### Deploying the Production Site Content
1. In the staging website, log in to WordPress admin.

2. Navigate to 'Tools'.

3. Select export and download file.

4. In the production website, log in to WordPress admin.

5. Import downloaded file.

6. Select 'Download and import file attachments' if relevant.

7. Confirm that the imported content appears correctly on the staging site.

8. Notify team members once the production deployment has been completed successfully.

