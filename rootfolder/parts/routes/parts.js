const fs = require('fs');

module.exports = {
    addPartPage: (req, res) => {
        res.render('add-part.ejs', {
            title: "Project Ki | Add a new part"
            ,message: ''
        });
    },
    addPart: (req, res) => {

        let message = '';
        let part_number = req.body.part_number;
        let description = req.body.description;
        let manufacturer = req.body.manufacturer;
        let supplier = req.body.supplier;
        let price = req.body.price;

        let partQuery = "SELECT * FROM `parts` WHERE part_number = '" + part_number + "'";

        db.query(partQuery, (err, result) => {
            if (err) {
                return res.status(500).send(err);
            }
            if (result.length > 0) {
                message = 'Part number already exists';
                res.render('add-part.ejs', {
                    message,
                    title: "Project Ki | Add a new part"
                });
            } else {
              // send the part's details to the database
              let query = "INSERT INTO `parts` (part_number, description, manufacturer, supplier, price) VALUES ('" +
                  part_number + "', '" + description + "', '" + manufacturer + "', '" + supplier + "', '" + price + "')";
              db.query(query, (err, result) => {
                if (err) {
                  return res.status(500).send(err);
                }
                res.redirect('/');
              });
            }
        });
    },
    editPartPage: (req, res) => {
        let partId = req.params.id;
        let query = "SELECT * FROM `parts` WHERE id = '" + partId + "' ";
        db.query(query, (err, result) => {
            if (err) {
                return res.status(500).send(err);
            }
            res.render('edit-part.ejs', {
                title: "Edit  Part"
                ,part: result[0]
                ,message: ''
            });
        });
    },
    editPart: (req, res) => {
        let partId = req.params.id;
        let part_number = req.body.part_number;
        let description = req.body.description;
        let manufacturer = req.body.manufacturer;
        let supplier = req.body.supplier;
        let price = req.body.price;

        let query = "UPDATE `parts` SET `part_number` = '" + part_number + "', `description` = '" + description + "', `manufacturer` = '" + manufacturer + "', `supplier` = '" + supplier + "', `price` = '" + price + "' WHERE `parts`.`id` = '" + partId + "'";
        db.query(query, (err, result) => {
            if (err) {
                return res.status(500).send(err);
            }
            res.redirect('/');
        });
    },
    deletePart: (req, res) => {
        let partId = req.params.id;
        let deleteUserQuery = 'DELETE FROM parts WHERE id = "' + partId + '"';
        db.query(deleteUserQuery, (err, result) => {
          if (err) {
            return res.status(500).send(err);
          }
          res.redirect('/');
        });
    }
};
