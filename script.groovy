 def installComposer(pwd) {

    final folder = pwd.substring(pwd.lastIndexOf("/")+1,pwd.length())

    echo 'installing dependencies with composer ...'
    withCredentials([usernamePassword(credentialsId:'docker-hub', passwordVariable:'PASS', usernameVariable:'USER')]) {
        sh "echo $PASS | docker login -u $USER --password-stdin"
        sh "docker  run --rm --interactive  \
                        --volume /var/lib/docker/volumes/jenkins_home/_data/workspace/$folder:/app \
                        --volume /var/lib/docker/volumes/jenkins_home/_data/gitlab/auth.json:/tmp/auth.json \
                        composer update --ignore-platform-reqs"
    }
}

def buildDevImage() {
    echo 'building the docker image ...'
    withCredentials([usernamePassword(credentialsId:'nexus-docker-repo', passwordVariable:'PASS', usernameVariable:'USER')]) {
        sh 'docker build -t gostaresh-dev:latest .'
        sh "echo $PASS | docker login dev.nexus.daan.ir:8083 -u $USER --password-stdin"
        sh 'docker tag gostaresh-dev:latest dev.nexus.daan.ir:8083/gostaresh-dev:latest'
        sh 'docker push dev.nexus.daan.ir:8083/gostaresh-dev:latest'
    }
}


def buildImage() {
    echo 'building the docker image ...'
    withCredentials([usernamePassword(credentialsId:'nexus-docker-repo', passwordVariable:'PASS', usernameVariable:'USER')]) {
        sh 'docker build -t gostaresh:latest .'
        sh "echo $PASS | docker login dev.nexus.daan.ir:8083 -u $USER --password-stdin"
        sh 'docker tag gostaresh:latest dev.nexus.daan.ir:8083/gostaresh:latest'
        sh 'docker push dev.nexus.daan.ir:8083/gostaresh:latest'
    }
}

return this
