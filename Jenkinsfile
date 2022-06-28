/* groovylint-disable CompileStatic, DuplicateStringLiteral, LineLength, NoDef, VariableTypeRequired */
def gv

pipeline {
    agent any
    stages {
        stage('init') {
            steps {
                script {
                    echo "Executing pipeline for branch $BRANCH_NAME"
                    gv = load 'script.groovy'
                }
            }
        }
        stage('install composer') {
            when {
                expression {
                    BRANCH_NAME == 'master' || BRANCH_NAME == 'develop'
                }
            }
            steps {
                script {
                    gv.installComposer("$WORKSPACE")
                }
            }
        }
        stage('build dev image') {
            when {
                expression {
                    BRANCH_NAME == 'develop'
                }
            }
            steps {
                script {
                    gv.buildDevImage()
                }
            }
        }
        stage('build image') {
            when {
                expression {
                    BRANCH_NAME == 'master'
                }
            }
            steps {
                script {
                    gv.buildImage()
                }
            }
        }

        // stage('deploy develop') {
        //     when {
        //         expression {
        //             BRANCH_NAME == 'develop'
        //         }
        //     }
        //     steps {
        //         script {
        //             echo 'deploy app'
        //             def deployCmd= "./app/deploy.sh"
        //             sshagent(['comma_ssh']) {
        //                 sh "ssh -o StrictHostKeyChecking=no ubuntu@erp.raahinio.ir ${deployCmd}"
        //             }
        //         }
        //     }
        // }

        stage('deploy master') {
            when {
                expression {
                    BRANCH_NAME == 'master'
                }
            }
            steps {
                script {
                    echo 'deploy app'
                    def deployCmd= "./app/deploy.sh"
                    sshagent(['comma_ssh']) {
                        sh "ssh -o StrictHostKeyChecking=no ubuntu@dw.daan.ir ${deployCmd}"
                    }
                }
            }
        }
    }
}
