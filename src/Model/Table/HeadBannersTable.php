<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HeadBanners Model
 *
 * @method \App\Model\Entity\HeadBanner get($primaryKey, $options = [])
 * @method \App\Model\Entity\HeadBanner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HeadBanner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HeadBanner|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HeadBanner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HeadBanner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HeadBanner findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HeadBannersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('head_banners');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title_st')
            ->requirePresence('title_st', 'create')
            ->notEmpty('title_st');

        $validator
            ->scalar('title_nd')
            ->requirePresence('title_nd', 'create')
            ->notEmpty('title_nd');

        $validator
            ->dateTime('start_special_date')
            ->allowEmpty('start_special_date');

        $validator
            ->dateTime('end__special_date')
            ->allowEmpty('end__special_date');

        $validator
            ->scalar('image')
            ->requirePresence('image', 'create')
            ->notEmpty('image');

        return $validator;
    }
}
