### Something to keep in mind: 
#### If you are using k3s's built in Traefik controller as the LB, make sure to expose port 80☺
#### for example: `k3d cluster create kube4 -p "80:80@loadbalancer" -s 1 -a 1`
