
# Hair Infinity 💇 (Educational Purpose)
Hair Infinity is a web platform designed for a hair salon. It combines a public showcase website, where visitors can learn about the salon and its services, with a private management area for employees and owners.
Project overview
The public-facing website presents the salon, its staff, and useful information for customers. Authorized staff members can sign in to a dashboard to access management pages. The project documentation demonstrates dashboard views and employee management operations, including searching, adding, editing, and deleting employee records.

The database design describes a broader management system for the salon, covering customers, staff and contracts, appointments, services, promotions, reviews, products, suppliers, warehouses, rooms, payment methods, and receipts. Access and available operations are intended to vary by user role: Customer, Employee, and Owner.
Main areas
- Public website: salon presentation, staff and service information, navigation between pages, and access to login.
- Staff dashboard: private area for authorized employees and owners.
- Employee management: view, search, create, update, and remove employee records.
- Database design: relational data model for the salon's operational and administrative information.
- Role-based access concept: different permissions for customers, employees, and owners.
Note: some items above describe the scope of the database design and project requirements; the exact availability of each feature depends on the implementation in the source code.

Technologies
- Backend: PHP with Laravel
- Frontend: HTML, CSS, JavaScript and Bootstrap
- Database: MySQL database design
- Development tooling mentioned in the project documentation: Node.js and Vite
Database model
The relational model includes entities and relationships for personal records, customers, staff, employment contracts, appointments, services, promotions, reviews, suppliers, products, categories, warehouses, rooms, payment methods, and receipts. Junction tables are used for many-to-many relationships, such as appointments and services.
Purpose
The goal is to provide a clear online presence for the salon while organizing its internal workflows and data in one web-based system.
