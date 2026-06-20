# 🚀 Scalable Web Application with Application Load Balancer & Auto Scaling on AWS

## 📌 Project Overview

This project demonstrates the deployment of a highly available and scalable web application on AWS using Amazon EC2, Application Load Balancer (ALB), and Auto Scaling Groups (ASG).

The architecture automatically distributes incoming traffic across multiple EC2 instances and dynamically scales resources based on demand, ensuring high performance, fault tolerance, and cost optimization.

---

## 🎯 Project Objectives

- Build a scalable web application architecture.
- Distribute traffic using Application Load Balancer.
- Automatically launch additional EC2 instances during high traffic.
- Automatically terminate extra instances during low traffic.
- Improve application availability and fault tolerance.
- Implement health monitoring and automated recovery.

---

## 🛠️ AWS Services Used

| Service | Purpose |
|----------|----------|
| Amazon EC2 | Host the web application |
| Application Load Balancer | Distribute incoming traffic |
| Auto Scaling Group | Automatically scale EC2 instances |
| Target Group | Manage healthy instances |
| Security Groups | Control network access |
| Amazon CloudWatch | Monitor CPU utilization and scaling |
| Amazon VPC | Provide network isolation |

---

## 📐 Architecture Workflow

```text
Users
   │
   ▼
Application Load Balancer
   │
   ▼
Target Group
   │
 ┌─┴────────────┐
 ▼             ▼
EC2 Instance  EC2 Instance
(Web Server)  (Web Server)
   │             │
   └─────┬───────┘
         ▼
Auto Scaling Group
(Min: 2 | Desired: 2 | Max: 5)
```

---

## 🔒 Security Configuration

### ALB Security Group

| Type | Port |
|--------|--------|
| HTTP | 80 |

### EC2 Security Group

| Type | Port | Source |
|--------|--------|---------|
| HTTP | 80 | ALB Security Group |
| SSH | 22 | My IP |

---

## ⚙️ Auto Scaling Configuration

| Parameter | Value |
|------------|---------|
| Desired Capacity | 2 |
| Minimum Capacity | 2 |
| Maximum Capacity | 5 |
| Scaling Policy | Target Tracking |
| Metric | Average CPU Utilization |
| Target Value | 60% |

### Scaling Behavior

- CPU > 60% → Launch New EC2 Instance
- CPU < 60% → Terminate Extra EC2 Instance

---

## 🚀 Deployment Steps

### Step 1: Launch EC2 Instance

- Launch Amazon Linux 2023 EC2 instance.
- Configure Security Group.
- Allow HTTP (80) and SSH (22).

### Step 2: Install Apache Web Server

```bash
sudo dnf update -y
sudo dnf install httpd -y

sudo systemctl start httpd
sudo systemctl enable httpd
```

### Step 3: Create Web Application

```bash
sudo nano /var/www/html/index.html
```

Add your HTML code and save.

### Step 4: Create AMI

- Create an AMI from the configured EC2 instance.
- Wait for AMI status to become Available.

### Step 5: Create Launch Template

- Select the created AMI.
- Configure instance type and security group.

### Step 6: Create Target Group

- Target Type: Instances
- Protocol: HTTP
- Port: 80

### Step 7: Create Application Load Balancer

- Internet Facing
- HTTP Listener (Port 80)
- Forward requests to Target Group

### Step 8: Create Auto Scaling Group

- Attach Launch Template
- Attach Target Group
- Configure Scaling Policy

---

## 📊 Monitoring

Amazon CloudWatch is used to:

- Monitor CPU Utilization
- Track Scaling Activities
- Monitor Instance Health
- View Auto Scaling Events

---

## 🧪 Testing Auto Scaling

Install Stress Tool:

```bash
sudo dnf install stress -y
```

Generate CPU Load:

```bash
stress --cpu 4 --timeout 600
```

Monitor:

```text
EC2 → Auto Scaling Groups → Activity
```

Expected Result:

- New EC2 instances launch automatically when CPU exceeds 60%.
- Extra instances terminate automatically when CPU drops.

---

## 🎯 Key Features

✅ Application Load Balancing

✅ Auto Scaling

✅ High Availability

✅ Fault Tolerance

✅ Traffic Distribution

✅ Automated Recovery

✅ Cost Optimization

✅ Cloud Monitoring

---

## 📚 Learning Outcomes

Through this project, I gained hands-on experience with:

- Amazon EC2
- Application Load Balancer
- Auto Scaling Groups
- Target Groups
- Security Groups
- CloudWatch Monitoring
- High Availability Architecture
- AWS Infrastructure Design

---

## 🌟 Benefits of This Architecture

- Handles High Traffic Efficiently
- Automatic Resource Scaling
- Reduced Downtime
- Improved User Experience
- Production-Ready Design
- Cost Efficient Infrastructure

---

## 👨‍💻 Author

**Sanika Pawar**

AWS Cloud & DevOps Enthusiast

---

## 🙏 Acknowledgement

Special thanks to my mentor and institute for their continuous guidance, support, and encouragement throughout my AWS Cloud learning journey.

---

## ⭐ If you found this project useful, please give it a Star!
