<?php

/*
    Asatru PHP - Model
*/

/**
 * This class extends the base model class and represents your associated table
 */ 
class BackgroundsModel extends \Asatru\Database\Model {
    /**
     * @param $limit
     * @return mixed
     * @throws \Exception
     */
    public static function queryAssets($limit = 0)
    {
        try {
            $limit = ($limit > 0) ? 'LIMIT ' . $limit : '';

            return static::raw('SELECT * FROM `' . self::tableName() . '` WHERE active = 1 ORDER BY name ASC ' . $limit);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /*
     * Return the associated table name of the migration
     * 
     * @return string
     */
    public static function tableName()
    {
        return 'tbl_backgrounds';
    }
}