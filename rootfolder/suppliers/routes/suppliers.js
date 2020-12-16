const fs = require('fs');

module.exports = {
    addSupplierPage: (req, res) => {
        res.render('add-supplier.ejs', {
            title: "Project Ki | Add a new supplier"
            ,message: ''
        });
    },
    addSupplier: (req, res) => {

        let message = '';
        let name = req.body.name;
        let abbreviation = req.body.abbreviation;
        let account = req.body.account;
        let contact = req.body.contact;
        let address = req.body.address;
        let phone = req.body.phone;

        let supplierQuery = "SELECT * FROM `suppliers` WHERE name = '" + name + "'";

        db.query(supplierQuery, (err, result) => {
            if (err) {
                return res.status(500).send(err);
            }
            if (result.length > 0) {
                message = 'Supplier already exists';
                res.render('add-supplier.ejs', {
                    message,
                    title: "Project Ki | Add a new supplier"
                });
            } else {
              // send the supplier's details to the database
              let query = "INSERT INTO `suppliers` (name, abbreviation, account, contact, address, phone) VALUES ('" +
                  name + "', '" + abbreviation + "', '" + account + "', '" + contact + "', '" + address + "', '" + phone + "')";
              db.query(query, (err, result) => {
                if (err) {
                  return res.status(500).send(err);
                }
                res.redirect('/');
              });
            }
        });
    },
    editSupplierPage: (req, res) => {
        let supplierId = req.params.id;
        let query = "SELECT * FROM `suppliers` WHERE id = '" + supplierId + "' ";
        db.query(query, (err, result) => {
            if (err) {
                return res.status(500).send(err);
            }
            res.render('edit-supplier.ejs', {
                title: "Edit  Supplier"
                ,supplier: result[0]
                ,message: ''
            });
        });
    },
    editSupplier: (req, res) => {
        let supplierId = req.params.id;
        let name = req.body.name;
        let abbreviation = req.body.abbreviation;
        let account = req.body.account;
        let contact = req.body.contact;
        let address = req.body.address;
        let phone = req.body.phone;

        let query = "UPDATE `suppliers` SET `name` = '" + name + "', `abbreviation` = '" + abbreviation + "', `account` = '" + account + "', `contact` = '" + contact + "', `address` = '" + address + "', `phone` = '" + phone + "' WHERE `suppliers`.`id` = '" + supplierId + "'";
        db.query(query, (err, result) => {
            if (err) {
                return res.status(500).send(err);
            }
            res.redirect('/');
        });
    },
    deleteSupplier: (req, res) => {
        let supplierId = req.params.id;
        let deleteUserQuery = 'DELETE FROM suppliers WHERE id = "' + supplierId + '"';
        db.query(deleteUserQuery, (err, result) => {
          if (err) {
            return res.status(500).send(err);
          }
          res.redirect('/');
        });
    }
};
