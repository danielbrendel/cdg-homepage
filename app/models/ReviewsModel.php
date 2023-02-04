<?php

/**
 * Class ReviewsModel
 */ 
class ReviewsModel extends \Asatru\Database\Model
{
    /**
     * Get all reviews
     * 
     * @return mixed
     */
    public static function getAllReviews()
    {
        try {
            return ReviewsModel::raw('SELECT * FROM `' . self::tableName() . '` WHERE active = 1 ORDER BY RAND()');
        } catch (Exception $e) {
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
        return 'tbl_reviews';
    }
}