<?php
namespace App\Entity\Fixture;

use App\Acl;
use App\Entity;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RolePermission extends AbstractFixture implements DependentFixtureInterface
{
    public function load(ObjectManager $em)
    {
        /** @var Entity\Station $station */
        $station = $this->getReference('station');

        $permissions = [
            'admin_role' => [
                [Acl::GLOBAL_ALL, null],
            ],
            'demo_role' => [
                [Acl::STATION_ALL, $station],
                [Acl::STATION_VIEW, $station],
            ],
        ];

        foreach ($permissions as $role_reference => $perm_names) {
            /** @var Entity\Role $role */
            $role = $this->getReference($role_reference);

            foreach ($perm_names as $perm_name) {
                $rp = new Entity\RolePermission($role, $perm_name[1], $perm_name[0]);
                $em->persist($rp);
            }
        }

        $em->flush();
    }

    /**
     * @return string[]
     */
    public function getDependencies()
    {
        return [
            Role::class,
        ];
    }
}
