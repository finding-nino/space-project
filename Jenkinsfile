pipeline {
    agent any

    stages {
        stage('Prepare') {
            steps {
                sh 'cp /env/space-project.env .env'
            }
        }
        stage('Build') {
            steps {
                sh 'docker-compose stop nginx phpfpm'
                sh 'docker-compose rm -f nginx phpfpm'
            }
        }
        stage('Deploy') {
            steps {
                sh 'docker-compose up --build -d nginx phpfpm'
            }
        }
    }
}