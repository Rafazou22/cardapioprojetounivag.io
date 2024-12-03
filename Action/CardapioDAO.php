<?php 

namespace connect;

class CardapioDAO {
    public function create(Cardapio $p) {
        $sql = 'INSERT INTO cardapio (foto, nome, tipo, descricao, valor) VALUES (?,?,?,?,?)';
        $stmt = Conn::getConn()->prepare($sql);

        $stmt->bindValue(1, $p->getFoto());
        $stmt->bindValue(2, $p->getNome());
        $stmt->bindValue(3, $p->getTipo());
        $stmt->bindValue(4, $p->getDescricao());
        $stmt->bindValue(5, $p->getValor());

        return $stmt->execute();
    }

    public function read() {
        $sql = 'SELECT * FROM cardapio';
        $stmt = Conn::getConn()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        return [];
    }

    public function update(Cardapio $p) {
        $sql = 'UPDATE cardapio SET foto = ?, nome = ?, tipo = ?, descricao = ?, valor = ? WHERE id = ?';
        $stmt = Conn::getConn()->prepare($sql);

        $stmt->bindValue(1, $p->getFoto());
        $stmt->bindValue(2, $p->getNome());
        $stmt->bindValue(3, $p->getTipo());
        $stmt->bindValue(4, $p->getDescricao());
        $stmt->bindValue(5, $p->getValor());
        $stmt->bindValue(6, $p->getId());

        return $stmt->execute();
    }

    public function delete($id) {
        $sql = 'DELETE FROM cardapio WHERE id = ?';
        $stmt = Conn::getConn()->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();
    }
}
