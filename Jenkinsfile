pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                sh 'docker compose down'
            }
        }
        stage('Deploy') {
            steps {
                sh 'docker compose up --build -d'
            }
        }
    }
}