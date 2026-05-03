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
                sh 'docker-compose down'
            }
        }
        stage('Deploy') {
            steps {
                sh 'docker-compose up --build -d'
            }
        }
    }
}