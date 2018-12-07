#!/bin/sh
pipeline {
    agent any
    stages {
        stage('Checkout Repo') {
            steps {
								checkout scm
            }
        }
				stage('Build') {
            steps {
								sh 'chmod --recursive a+rwx ./bin/install-wp-tests.sh'
								sh './bin/install-wp-tests.sh wordpress wordpress wordpress 127.0.0.1 4.9.8 false'
            }
        }
				stage('Test') {
            steps {
								sh 'chmod --recursive a+rwx ./bin/do-tests.sh'
								sh './bin/do-tests.sh'
            }
        }
    }
		post {
			success {
				echo 'For the win!'
			}
			failure {
				echo 'Epic Fail!'
			}
			always{
				sh 'mysql -uwordpress -pwordpress -e "DROP DATABASE IF EXISTS wordpress"'
				deleteDir()
			}
		}
}
