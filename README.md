# 🎓 Student Grading System

A web-based academic grading and result management system built with **PHP** and **MySQL**, designed to manage students, staff, courses, departments, and academic results across faculties and semesters.

---

## Live Demo

You can access the live demo of the project here:  
http://studentgrading.atwebpages.com/

---

## Overview

The Student Grading System is a multi-role academic management platform that allows institutions to:

- Organize faculties, departments, sessions, semesters, and courses
- Manage student and staff records
- Record and compute semester results and CGPA
- Generate printable result sheets and grading reports
- Assign administrative roles and control access levels

---

## Features

### Super Admin / Admin Portal (`/superAdmin`)
- ✅ Dashboard with system overview
- ✅ Create and manage **Faculties** and **Departments**
- ✅ Create and manage **Academic Sessions** and **Semesters**
- ✅ Create and manage **Courses** (with credit units)
- ✅ Create and manage **Students** and **Staff**
- ✅ Assign Admin roles to staff members
- ✅ Assign Staff (lecturers) to departments
- ✅ Enter and manage **Semester Results** per student per course
- ✅ View and print **Final Results** and **CGPA**
- ✅ View **Grading Criteria** and print reports
- ✅ Change password and update profile
- ✅ Activate/deactivate academic sessions

### Student Portal (`/student`)
- ✅ View enrolled courses per semester
- ✅ View semester results and grades
- ✅ View cumulative final result (CGPA)
- ✅ View faculty and department information
- ✅ View staff/lecturers in department
- ✅ View grading criteria
- ✅ Print result sheet (PDF via DomPDF)
- ✅ Change password and update profile

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 5.6 / 7.4 |
| Database | MySQL (via MySQLi) |
| Frontend | HTML5, CSS3, Bootstrap 4 |
| JavaScript | jQuery, AJAX |
| PDF Export | DomPDF *(must be downloaded separately)* |
| Icons | Font Awesome, Themify Icons |
| Animations | AOS.js, Swiper |

---

## System Roles

The system has three user roles:

### 1. 🔑 Super Administrator
- Full access to all system features
- Can create and manage other admins
- Can assign and revoke admin roles
- Manages all academic data

### 2. 🎓 Student
- Read-only access to their own academic records
- Can view results, courses, faculty, and staff info
- Can print their result sheet

---

## Database Schema

The system uses the `resultgrading` MySQL database with the following tables:

| Table | Description |
|---|---|
| `tbladmin` | Admin user accounts (Super Admin & Admin) |
| `tbladmintype` | Admin role types (Super Administrator, Administrator) |
| `tblassignedadmin` | Mapping of admins assigned to departments/faculties |
| `tblstaff` | Staff/lecturer records |
| `tblstudent` | Student records and enrollment info |
| `tblfaculty` | Faculty definitions |
| `tbldepartment` | Department definitions linked to faculties |
| `tblcourse` | Course definitions with credit units |
| `tblsession` | Academic sessions (e.g., 2021/2022) |
| `tblsemester` | Semesters within sessions (First / Second) |
| `tbllevel` | Academic levels (e.g., 100L, 200L) |
| `tblresult` | Semester-level scores per student per course |
| `tblfinalresult` | Aggregated GPA results per student per session |
| `tblcgparesult` | Cumulative GPA (CGPA) calculations |

---

## Grading Criteria

Scores are converted to letter grades and grade points as follows:

| Score Range | Letter Grade | Grade Point |
|---|---|---|
| 75 – 100 | AA | 4.00 |
| 70 – 74 | A | 3.50 |
| 65 – 69 | AB | 3.25 |
| 60 – 64 | B | 3.00 |
| 55 – 59 | BC | 2.75 |
| 50 – 54 | C | 2.50 |
| 45 – 49 | CD | 2.25 |
| 40 – 44 | D | 2.00 |
| 0 – 39 | F | 0.00 |

### Class of Diploma (based on CGPA)

| CGPA Range | Classification |
|---|---|
| 3.50 – 4.00 | Distinction |
| 3.00 – 3.49 | Upper Credit |
| 2.50 – 2.99 | Lower Credit |
| 2.00 – 2.49 | Pass |
| Below 2.00 | Fail |

---

## Directory Structure

```
Student-Grading-System/
│
├── index.php                  # Landing / home page
├── adminLogin.php             # Admin login page
├── studentLogin.php           # Student login page
│
├── includes/                  # Shared PHP helpers
│   ├── dbconnection.php       # Database connection
│   ├── functions.php          # Grading logic functions
│   ├── session.php            # Session management
│   └── dataValues.php         # Shared data constants
│
├── superAdmin/                # Admin & Super Admin portal
│   ├── index.php              # Admin dashboard
│   ├── createStudent.php      # Add new student
│   ├── editStudent.php        # Edit student details
│   ├── createCourses.php      # Add new course
│   ├── createFaculty.php      # Add faculty
│   ├── createDepartment.php   # Add department
│   ├── createSession.php      # Add academic session
│   ├── createAdmin.php        # Add new admin user
│   ├── assignAdmin.php        # Assign admin to dept/faculty
│   ├── assignStaff.php        # Assign staff/lecturer
│   ├── viewSemesterResult.php # View student semester results
│   ├── viewFinalResult.php    # View cumulative results
│   ├── printSemesterResult.php# Print result sheet
│   ├── gradingCriteria.php    # View grading scale
│   ├── finalResult.php        # Final result management
│   ├── studentList.php        # List all students
│   └── ...                    # Other management pages
│
├── student/                   # Student portal
│   ├── index.php              # Student dashboard
│   ├── studentResult.php      # View semester results
│   ├── studentCourses.php     # View enrolled courses
│   ├── viewFinalResult.php    # View CGPA
│   ├── studentPrintResult.php # Print result (PDF)
│   ├── gradingCriteria.php    # View grading scale
│   ├── viewFaculty.php        # View faculty info
│   ├── viewDepartment.php     # View department info
│   ├── viewstaff.php          # View staff/lecturers
│   ├── updateProfile.php      # Edit student profile
│   └── changePassword.php     # Change password
│
├── DATABASE FILE/
│   └── 4756754_resultgrading.sql  # MySQL database dump
│
└── assets/                    # CSS, JS, images, fonts
```
## Default Login Credentials

### Admin Login (`/adminLogin.php`)

| Field | Value |
|---|---|
| Username | `AD123` |
| Password | `codeastro.com` |

### Student Login (`/studentLogin.php`)
Student credentials are created by the admin through the student management panel and it takes password (codeastro) by default .


