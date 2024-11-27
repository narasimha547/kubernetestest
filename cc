- name: Deploy to DigitalOcean Droplet
  uses: appleboy/ssh-action@v0.1.8
  with:
    host: ${{ secrets.DROPLET_IP }}
    username: root
    key: ${{ secrets.SSH_PRIVATE_KEY }}
    port: 22
    script: |
      docker pull ${{ secrets.DOCKER_USERNAME }}/your-image-name:latest
      docker stop your-container-name || true
      docker rm your-container-name || true
      docker run -d --name your-container-name -p 80:80 ${{ secrets.DOCKER_USERNAME }}/your-image-name:latest
